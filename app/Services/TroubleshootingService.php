<?php

namespace App\Services;

use App\Exceptions\TranslatableException;
use App\Models\AdminInvite;
use App\Models\Campaign;
use App\User;
use Illuminate\Support\Str;

class TroubleshootingService
{
    protected Campaign $campaign;

    protected User $user;

    /**
     * @param int $campaignID
     * @return $this
     */
    public function campaign(int $campaignID): self
    {
        $this->campaign = Campaign::findOrFail($campaignID);
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

    /**
     * Generate a list of campaigns the user is an admin of
     * @return array
     */
    public function campaigns(): array
    {
        $campaigns = [
            '' => __('helpers.troubleshooting.select_campaign')
        ];
        foreach ($this->user->adminCampaigns() as $id => $name) {
            $campaigns[$id] = $name;
        }

        return $campaigns;
    }

    /**
     * Generate a unique token for the kanka team to join a campaign
     * @return AdminInvite
     * @throws TranslatableException
     */
    public function generate(): AdminInvite
    {
        // Already has a token?
        $exists = AdminInvite::check($this->campaign->id)->first();
        if ($exists) {
            throw (new TranslatableException('helpers.troubleshooting.errors.token_exists'))
                ->setOptions(['campaign' => $this->campaign->name]);
        }
        $token = new AdminInvite();
        $token->created_by = $this->user->id;
        $token->campaign_id = $this->campaign->id;
        $token->token = Str::uuid();
        $token->save();

        return $token;
    }
}
