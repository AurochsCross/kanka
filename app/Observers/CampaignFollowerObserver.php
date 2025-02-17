<?php


namespace App\Observers;


use App\Facades\CampaignCache;
use App\Facades\UserCache;
use App\Models\CampaignFollower;

class CampaignFollowerObserver
{
    /**
     * @param CampaignFollower $campaignFollower
     */
    public function created(CampaignFollower $campaignFollower)
    {
        UserCache::clearFollows();
        $campaignFollower->campaign->follower++;
        $campaignFollower->campaign->save(); 

    }

    /**
     * @param CampaignFollower $campaignFollower
     */
    public function deleted(CampaignFollower $campaignFollower)
    {
        UserCache::clearFollows();
        $campaignFollower->campaign->follower--;
        $campaignFollower->campaign->save(); 
    }
}
