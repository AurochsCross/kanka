<?php

namespace App\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait CommunityVoteScopes
 * @package App\Models\Scopes
 *
 * @method static self|Builder published()
 * @method static self|Builder voting()
 * @method static self|Builder recent()
 * @method static self|Builder visible()
 */
trait CommunityVoteScopes
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeVisible(Builder $builder): Builder
    {
        return $builder
            ->where('visible_at', '<=', Carbon::now());
    }

    /**
     * @param Builder $builder
     */
    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('published_at', '<=', Carbon::now());
    }

    /**
     * @param Builder $builder
     */
    public function scopeVoting(Builder $builder): Builder
    {
        // @phpstan-ignore-next-line
        return $builder
            ->where('published_at', '>=', Carbon::now())
            ->visible();
    }

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeRecent(Builder $builder): Builder
    {
        // @phpstan-ignore-next-line
        return $builder
            ->published()
            ->orderBy('published_at', 'DESC')
            ->take(5);
    }
}
