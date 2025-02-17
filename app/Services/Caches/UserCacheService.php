<?php

namespace App\Services\Caches;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserCacheService extends BaseCache
{
    /**
     * Check if a user is an admin of a campaign
     * @return bool
     */
    public function admin(): bool
    {
        return $this->adminRole()
            ->count() === 1;
    }

    /**
     * Get the user's admin role in a current campaign
     * @return Collection
     */
    public function adminRole(): Collection
    {
        return $this->roles()
            ->where('campaign_id', $this->campaign->id)
            ->where('is_admin', true);
    }

    /**
     * Get the user campaigns
     * @return Collection
     */
    public function campaigns(): Collection
    {
        $key = $this->campaignsKey();
        if ($this->has($key)) {
            return $this->get($key);
        }

        /** @var Builder|mixed $query */
        $query = $this->user->campaigns();
        $data = [];

        // order the campaigns array based on the user settings
        switch ($this->user->campaignSwitcherOrderBy) {
            case 'alphabetical':
                $data = $query->orderBy('name', 'asc')->get();
                break;
            case 'r_alphabetical':
                $data = $query->orderBy('name', 'desc')->get();
                break;
            case 'date_joined':
                $data = $query->withPivot('created_at')->orderBy('pivot_created_at', 'asc')->get();
                break;
            case 'r_date_joined':
                $data = $query->withPivot('created_at')->orderBy('pivot_created_at', 'desc')->get();
                break;
            case 'date_created':
                $data = $query->orderBy('created_at', 'asc')->get();
                break;
            case 'r_date_created':
                $data = $query->orderBy('created_at', 'desc')->get();
                break;
            default:
                $data = $query->get();
                break;
        }

        $this->forever($key, $data);

        return $data;
    }

    /**
     * Clear user campaign cache
     * @return $this
     */
    public function clearCampaigns(): self
    {
        $key = $this->campaignsKey();
        $this->forget($key);
        return $this;
    }

    /**
     * Get the user roles
     * @return Collection
     */
    public function roles(): Collection
    {
        $key = $this->rolesKey();
        if ($this->has($key)) {
            $roles = $this->get($key);
            if ($roles !== null) {
                return $roles;
            }
        }

        $data = $this->user->campaignRoles;
        $this->forever($key, $data);

        return $data;
    }

    /**
     * Clear user roles cache
     * @return $this
     */
    public function clearRoles(): self
    {
        $key = $this->rolesKey();
        $this->forget($key);
        return $this;
    }

    /**
     * Get the user follows
     * @return Collection
     */
    public function follows(): Collection
    {
        $key = $this->followsKey();
        if ($this->has($key)) {
            return $this->get($key);
        }

        /** @var \Illuminate\Database\Query\Builder $query */
        $query = $data = $this->user->following()->public();
        $data = [];

        // order the campaigns array based on the user settings
        switch ($this->user->campaignSwitcherOrderBy) {
            case 'alphabetical':
                $data = $query->orderBy('name', 'asc')->get();
                break;
            case 'r_alphabetical':
                $data = $query->orderBy('name', 'desc')->get();
                break;
            case 'date_joined':
                // @phpstan-ignore-next-line
                $data = $query->withPivot('created_at')->orderBy('pivot_created_at', 'asc')->get();
                break;
            case 'r_date_joined':
                // @phpstan-ignore-next-line
                $data = $query->withPivot('created_at')->orderBy('pivot_created_at', 'desc')->get();
                break;
            case 'date_created':
                $data = $query->orderBy('created_at', 'asc')->get();
                break;
            case 'r_date_created':
                $data = $query->orderBy('created_at', 'desc')->get();
                break;
            default:
                $data = $query->get();
                break;
        }
        $this->forever($key, $data);

        return $data;
    }

    /**
     * Clear user campaign cache
     * @return $this
     */
    public function clearFollows(): self
    {
        $key = $this->followsKey();
        $this->forget($key);
        return $this;
    }

    /**
     * Get the user name
     * @param int $userId the user id
     * @return string
     */
    public function name(int $userId): string
    {
        $key = $this->nameKey($userId);
        if ($this->has($key)) {
            return (string) $this->get($key);
        }

        $data = null;
        if ($user = User::select('name')->find($userId)) {
            $data = $user->name;
        }

        $this->forever($key, $data);

        return $data;
    }

    /**
     * @return $this
     */
    public function clearName(): self
    {
        $key = $this->nameKey($this->user->id);
        $this->forget($key);
        return $this;
    }

    public function entitiesCreatedCount(): int
    {
        $key = 'user_' . $this->user->id . '_entities_created_count';
        if ($this->has($key)) {
            return (int) $this->get($key);
        }

        $data = DB::table('entities')->where('created_by', $this->user->id)->count();

        $this->forever($key, $data, 1);

        return $data;
    }

    /**
     * @return string
     */
    protected function rolesKey(): string
    {
        return 'user_' . $this->user->id . '_roles';
    }

    /**
     * @return string
     */
    protected function campaignsKey(): string
    {
        return 'user_' . $this->user->id . '_campaigns';
    }

    /**
     * @return string
     */
    protected function followsKey(): string
    {
        return 'user_' . $this->user->id . '_follows';
    }

    /**
     * @return string
     */
    protected function nameKey(int $userId): string
    {
        return 'user_' . $userId . '_name';
    }
}
