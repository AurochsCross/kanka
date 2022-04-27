<?php

namespace App\Services\Permissions;

use App\Facades\CampaignCache;
use App\Facades\UserCache;
use App\Models\Campaign;
use App\Models\CampaignPermission;
use App\Models\CampaignRole;
use App\Models\EntityNotePermission;
use App\User;
use Illuminate\Support\Str;

class PermissionService
{
    /** @var Campaign */
    protected $campaign;

    /** @var User */
    protected $user;

    /** @var string read|view|delete */
    protected $action;

    /** @var array Entity IDs and Types the user can access */
    protected $entityIds = [];
    protected $entityTypes = [];
    protected $entityTypesIds = [];
    protected $deniedIds = [];
    protected $allowedModels = [];
    protected $deniedModels = [];
    protected $loadedPermissions = false;

    /** @var array Permissions for posts */
    protected $allowedPostIDs = [];
    protected $deniedPostIDs = [];
    protected $loadedPosts = false;

    protected $loadedRoles = false;
    protected $admin = false;

    /** @var null|string the entity type if provided to limit queries */
    protected $entityType = null;

    /**
     * @param Campaign $campaign
     * @return $this
     */
    public function campaign(Campaign $campaign): self
    {
        $this->campaign = $campaign;
        return $this;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function user(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function isAdmin(): bool
    {
        $this->loadPermissions();
        return $this->admin;
    }

    public function action(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function reload(): self
    {
        $this->entityIds = [];
        $this->entityTypes = [];
        $this->entityTypesIds = [];
        $this->deniedIds = [];
        $this->loadedRoles = false;
        $this->admin = false;
        return $this;
    }

    public function entityType(string $entityType): self
    {
        $this->entityType = $entityType;
        return $this;
    }

    /**
     * List of post ids the user has access to
     * @return array
     */
    public function allowedPosts(): array
    {
        return $this->loadPostPermissions()
            ->allowedPostIDs();
    }

    /**
     * List of post ids the user doesn't have access to
     * @return array
     */
    public function deniedPosts(): array
    {
        return $this->loadPostPermissions()
            ->deniedPostIDs();
    }

    public function allowedEntities(): array
    {
        $this->loadPermissions();
        return $this->entityIds;
    }

    public function allowedEntityTypes(): array
    {
        $this->loadPermissions();
        return $this->entityTypesIds;
    }

    public function deniedEntities(): array
    {
        $this->loadPermissions();
        return $this->deniedIds;
    }

    protected function allowedPostIDs(): array
    {
        return $this->allowedPostIDs;
    }

    protected function deniedPostIDs(): array
    {
        return $this->deniedPostIDs;
    }

    public function allowedModels(): array
    {
        $this->loadPermissions();
        return $this->allowedModels;
    }

    public function deniedModels(): array
    {
        $this->loadPermissions();
        return $this->deniedModels;
    }

    public function canRole(): bool
    {
        $this->loadPermissions();
        return in_array($this->entityType, $this->entityTypes);
    }

    /**
     * Load the permissions for posts (entity notes)
     * @return $this
     */
    protected function loadPostPermissions(): self
    {
        if ($this->loadedPosts) {
            return $this;
        }
        $this->loadedPosts = true;

        /** @var EntityNotePermission $perm */
        $perms = EntityNotePermission::select(['entity_note_id', 'permission'])
            ->where('user_id', $this->user->id)
            ->get();
        foreach ($perms as $perm) {
            if ($perm->permission === 2) {
                $this->deniedPostIDs[] = $perm->entity_note_id;
            } else {
                $this->allowedPostIDs[] = $perm->entity_note_id;
            }
        }

        // User roles
        $roles = $this->user->campaignRoleIDs($this->campaign->id);
        $perms = EntityNotePermission::select(['entity_note_id', 'permission'])
            ->whereIn('role_id', $roles)
            ->get();
        foreach ($perms as $perm) {
            if ($perm->permission === 2) {
                $this->deniedPostIDs[] = $perm->entity_note_id;
            } else {
                $this->allowedPostIDs[] = $perm->entity_note_id;
            }
        }

        return $this;
    }

    /**
     * Load the permissions of the user (roles and personal permissions)
     * @return bool
     */
    private function loadPermissions(): self
    {
        if ($this->loadedPermissions) {
            return $this;
        }
        $this->loadedPermissions = true;

        // Valid user: load their roles
        if ($this->user) {
            $this->loadRoles();
            $this->loadUserPermissions();
        }

        // If the user had no loaded roles, we need a public role
        if ($this->loadedRoles > 0) {
            return $this;
        }
        $this->loadPublicRole();

        return $this;
    }

    /**
     * Load the user's roles
     * @return $this
     */
    protected function loadRoles(): self
    {
        if ($this->loadedRoles !== false) {
            return $this;
        }
        $this->loadedRoles = 0;

        $roles = UserCache::user($this->user)->roles()->where('campaign_id', $this->campaign->id);
        foreach ($roles as $role) {
            $this->loadedRoles++;
            // If one of the roles is an admin, we don't need to figure any more stuff, we're good.
            if ($role->is_admin) {
                $this->admin = true;
                return $this;
            }
            $this->parseRole($role);
        }

        return $this;
    }

    protected function loadPublicRole(): void
    {
        // Go and get the Public role
        $publicRole = CampaignCache::campaign($this->campaign)
            ->roles()
            ->where('is_public', true)
            ->first();
        if ($publicRole) {
            $this->parseRole($publicRole);
        }
    }

    /**
     * Load the permissions of a role into the service
     * @param CampaignRole $role
     */
    protected function parseRole(CampaignRole $role): void
    {
        // Loop through the permissions of the role to get any blanket _read permissions on entities
        $permissions = \App\Facades\RolePermission::role($role)->permissions();
        foreach ($permissions as $permission) {
            $this->parseRolePermission($permission);
        }
    }

    /**
     * Parse a role permission
     * @param CampaignPermission $permission
     */
    protected function parseRolePermission(CampaignPermission $permission)
    {
        // Only test permissions who's action is being requested
        if ($permission->action() != $this->action) {
            return;
        }
        if (!empty($this->entityType) && $permission->table_name !== $this->entityType) {
            return;
        }

        if (empty($permission->entity_id)) {
            // This permission targets an entity type
            $type = Str::singular($permission->table_name);
            if (!in_array($type, $this->entityTypes)) {
                $this->entityTypes[] = $type;
                $this->entityTypesIds[] = config('entities.ids.' . $type);
            }
        } elseif ($permission->access && !in_array($permission->entity_id, $this->entityIds)) {
            // This permission targets an entity directly
            $this->entityIds[] = $permission->entity_id;
        } elseif (!$permission->access && !in_array($permission->entity_id, $this->deniedIds)) {
            // This permission targets an entity directly
            $this->deniedIds[] = $permission->entity_id;
        }
    }

    /**
     *
     */
    protected function loadUserPermissions(): void
    {
        // If we have a user, they might have individual entity permissions
        foreach (CampaignPermission::where('user_id', $this->user->id)->get() as $permission) {
            $this->parseUserPermission($permission);
        }
    }

    /**
     * Parse a permission
     * @param CampaignPermission $permission
     */
    protected function parseUserPermission(CampaignPermission $permission)
    {
        if ($permission->action() != $this->action) {
            return;
        }

        // If the permission set is negative, we need to add it to the denied ones too, in case a role of
        // the user has access to this entity.
        if ($permission->access) {
            if (!in_array($permission->entity_id, $this->entityIds)) {
                $this->entityIds[] = $permission->entity_id;
                $this->allowedModels[] = $permission->entityId();
            }
            // If the user was denied through a role but has access through a direct permissions, still allow them
            if (($key = array_search($permission->entity_id, $this->deniedIds)) !== false) {
                unset($this->deniedIds[$key]);
                if (($key = array_search($permission->entityId(), $this->deniedModels)) !== false) {
                    unset($this->deniedModels[$key]);
                }
            }

        } elseif (!$permission->access && !in_array($permission->entity_id, $this->deniedIds)) {
            $this->deniedIds[] = $permission->entity_id;
            $this->deniedModels[] = $permission->entityId();
        }
    }

}
