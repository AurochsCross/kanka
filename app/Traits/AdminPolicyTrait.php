<?php

namespace App\Traits;

use App\Facades\CampaignLocalization;
use App\Models\CampaignRole;
use App\User;

trait AdminPolicyTrait
{
    /**
     * Cached value of the check
     * @var bool|null
     */
    protected bool|null $cachedAdminPolicy = null;

    /**
     * Determine if a user is admin of a campaign
     * @param User $user
     * @return bool
     */
    public function isAdmin(User $user)
    {
        if ($this->cachedAdminPolicy === null) {
            $this->cachedAdminPolicy = false;
            $campaign = CampaignLocalization::getCampaign(false);
            /** @var CampaignRole[] $roles */
            $roles = $user->campaignRoles->where('campaign_id', $campaign->id);
            foreach ($roles as $role) {
                if ($role->is_admin) {
                    $this->cachedAdminPolicy = true;
                }
            }
        }

        return $this->cachedAdminPolicy;
    }
}
