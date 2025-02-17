<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserLog
 * @package App\Models
 *
 * @property int $user_id
 * @property int $type_id
 * @property string $ip
 * @property string $country
 * @property Carbon $created_at
 */
class UserLog extends Model
{
    use MassPrunable;

    public const TYPE_LOGIN = 1;
    public const TYPE_LOGOUT = 2;
    public const TYPE_AUTOLOGIN = 3;
    public const TYPE_UPDATE = 4;
    public const TYPE_SUB_NEW = 10;
    public const TYPE_SUB_CANCEL = 11;
    public const TYPE_SUB_UPGRADE = 12;
    public const TYPE_SUB_DOWNGRADE = 13;
    public const TYPE_SUB_FAIL = 15;

    public const TYPE_CAMPAIGN_NEW = 20;
    public const TYPE_CAMPAIGN_JOIN = 21;
    public const TYPE_CAMPAIGN_LEAVE = 22;
    public const TYPE_CAMPAIGN_DELETE = 23;

    public const TYPE_PASSWORD_UPDATE = 30;
    public const TYPE_PASSWORD_RESET = 31;
    public const TYPE_PASSWORD_REQUEST = 32;
    public const TYPE_PASSWORD_ADMIN_UPDATE = 35;

    public const TYPE_EMAIL_UPDATE = 40;
    public const TYPE_SOCIAL_SWITCH = 41;

    public const TYPE_USER_SWITCH = 50;
    public const TYPE_USER_REVERT = 51;
    public const TYPE_USER_SWITCH_LOGIN = 52;

    public const NOTIFY_YEARLY_SUB = 70;

    public const TYPE_FAILED_CHARGE_EMAIL = 80;
    public const TYPE_YEARLY_RENEW_WARNING = 81;
    public const TYPE_SUB_CANCEL_MANUAL = 82;
    public const TYPE_SUB_CANCEL_AUTO = 83;

    /**
     * @var string
     */
    public $table = 'user_logs';

    /** @var string[]  */
    protected $fillable = [
        'user_id',
        'type_id',
        'ip'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Automatically prune old elements from the db
     * @return Builder
     */
    public function prunable(): Builder
    {
        return static::where('updated_at', '<=', now()->subMonths(6));
    }
}
