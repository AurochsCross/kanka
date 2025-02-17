<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\MassPrunable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class EntityLog
 * @package App\Models
 *
 * @property integer $entity_id
 * @property integer $campaign_id
 * @property integer $created_by
 * @property integer $impersonated_by
 * @property integer $action
 * @property string|array  $changes
 * @property Entity $entity
 * @property User $user
 * @property User $impersonator
 * @property Campaign $campaign
 */
class EntityLog extends Model
{
    use MassPrunable;

    public const ACTION_CREATE = 1;
    public const ACTION_UPDATE = 2;
    public const ACTION_DELETE = 3;
    public const ACTION_RESTORE = 4;

    public $fillable = [
        'entity_id',
        'created_by',
        'impersonated_by',
        'action',
        'campaign_id',
    ];

    public $casts = [
        'changes' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo('App\Models\Entity', 'entity_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaign_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function impersonator()
    {
        return $this->belongsTo('App\User', 'impersonated_by');
    }

    /**
     * @return string
     */
    public function actionCode()
    {
        if ($this->action == self::ACTION_CREATE) {
            return 'create';
        } elseif ($this->action == self::ACTION_UPDATE) {
            return 'update';
        } elseif ($this->action == self::ACTION_DELETE) {
            return 'delete';
        } elseif ($this->action == self::ACTION_RESTORE) {
            return 'restore';
        }
        return 'unknown';
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeRecent(Builder $query)
    {
        return $query->orderBy('created_at', 'DESC')->orderBy('id', 'DESC');
    }

    /**
     * @param Builder $query
     * @param int $action
     * @return Builder
     */
    public function scopeAction(Builder $query, int $action)
    {
        return $query->where(['action' => $action]);
    }

    /**
     * Replace the field edited with it's translated name
     * @param string $transKey
     * @param string $attribute
     * @return string
     */
    public function attributeKey(string $transKey, string $attribute): string
    {
        // Try with crud first
        $name = Str::beforeLast($attribute, '_id');
        $key = 'crud.fields.' . $name;
        $translation = __($key);
        if ($key !== $translation) {
            return $translation;
        }

        return __($transKey . '.fields.' . $name);
    }

    /**
     * Automatically prune old elements from the db
     * @return Builder
     */
    public function prunable(): Builder
    {
        $delay = config('entities.logs_delete');
        return static::where('updated_at', '<=', now()->subDays($delay));
    }
}
