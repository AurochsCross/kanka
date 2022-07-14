<?php

namespace App\Models;

use App\User;
use App\Facades\Img;
use App\Models\Concerns\Uuid;
use App\Models\Scopes\CommunityEventScopes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Class CommunityEvent
 * @package App\Models
 *
 * @property int $id
 * @property string $uuid
 * @property string $name
 * @property string $entry
 * @property string $excerpt
 * @property string $image
 * @property Carbon $start_at
 * @property Carbon $end_at
 *
 * @property CommunityEventEntry[]|Collection $entries
 * @property CommunityEventEntry[]|Collection $rankedResults
 * @property User $jury
 */
class CommunityEvent extends Model
{
    use CommunityEventScopes, Uuid;

    public $dates = [
        'start_at',
        'end_at'
    ];

    /**
     * Determine if the event can be participated in
     * @return bool
     */
    public function isOngoing(): bool
    {
        return $this->start_at->isPast() && $this->end_at->isFuture();
    }

    /**
     * Determine if the event is in the future
     * @return bool
     */
    public function isScheduled(): bool
    {
        return $this->start_at->isFuture();
    }

    /**
     * Get the image (or default image) of an entity
     * @param int $width = 200
     * @param int $width = null
     * @param string $field = 'image'
     * @return string
     */
    public function getImageUrl(int $width = 400, int $height = null, string $field = 'image')
    {
        if (empty($this->$field)) {
            return null;
        }
        return Img::crop($width, (!empty($height) ? $height : $width))->url($this->$field);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function entries()
    {
        return $this->hasMany(CommunityEventEntry::class);
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->uuid . '-' . Str::slug($this->name);
    }

    /**
     * @param int $userId
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function userEntry(int $userId)
    {
        return $this->entries()->where('created_by', $userId)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function rankedResults()
    {
        return $this->entries()
            ->with('user')
            ->has('user')
            ->where(function ($rank) {
                // MySQL is weird where != -1 means that null gets also caught?
                return $rank
                    ->whereNull('rank')
                    ->orWhere('rank', '<>', -1);
            })
            ->orderByRaw('-rank desc');
    }

    /**
     * Determine if the event is finished & has a winner
     * @return bool
     */
    public function hasRankedResults(): bool
    {
        return !$this->rankedResults->where('rank', 1)->isEmpty();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jury()
    {
        return $this->belongsTo(User::class, 'jury_id');
    }
}
