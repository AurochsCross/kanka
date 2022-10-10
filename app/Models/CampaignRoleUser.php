<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 * @package App\Models
 *
 * @property integer $id
 * @property integer $campaign_role_id
 * @property integer $user_id
 *
 * @property User $user
 * @property Campaign $campaign
 * @property CampaignRole $campaignRole
 */
class CampaignRoleUser extends Model
{
    /** @var string[]  */
    protected $fillable = [
        'campaign_role_id',
        'user_id',
    ];

    public function campaignRole()
    {
        return $this->belongsTo('App\Models\CampaignRole', 'campaign_role_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
