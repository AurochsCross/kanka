<?php

namespace App\Models\Concerns;

use App\Facades\CampaignCache;
use App\Facades\CampaignLocalization;
use App\Facades\Img;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait Picture
{
    /**
     * @param bool $thumb
     * @param string $field
     * @return string
     */
    public function avatar(bool $thumb = false, string $field = 'image')
    {
        $avatar = Cache::get($this->avatarCacheKey($thumb, $field), false);
        if ($avatar === false) {
            $avatar = $this->cacheAvatar($thumb, $field);
        }
        return $this->avatarUrl($avatar);
    }

    /**
     * @param bool $thumb
     * @param string $field
     * @return string
     */
    protected function cacheAvatar(bool $thumb, string $field)
    {
        // Can't get the child? Something is weird, let's cache something empty rather than crash the user
        if (empty($this->child)) {
            return '';
        }
        // Todo: we are caching with the user's nicer image here
        $avatar = $this->child->withEntity($this)->thumbnail();
        Cache::forever($this->avatarCacheKey($thumb, $field), $avatar);
        return $avatar;
    }

    /**
     * @param string $avatar
     * @return string
     */
    protected function avatarUrl(string $avatar)
    {
        // If it's a default image, subscribers have the nicer pictures.
        // Why do we do this here? Because it's based on the user, so it can't go in cache
        if (Str::contains($avatar, '/images/defaults/') && !Str::contains($avatar, '/patreon/')) {
            // Check if the campaign has a default image first
            $campaign = CampaignLocalization::getCampaign();
            if ($campaign->boosted() && Arr::has(CampaignCache::defaultImages(), $this->type())) {
                return Img::crop(40, 40)->url(CampaignCache::defaultImages()[$this->type()]['path']);
            }

            if (auth()->check() && auth()->user()->isGoblin()) {
                return str_replace(['defaults/', '.jpg'], ['defaults/patreon/', '.png'], $avatar);
            }
        }

        return $avatar;
    }

    /**
     * Clear cached images.
     */
    public function clearAvatarCache()
    {
        $fields = ['image'];
        if (!empty($this->child->cachedImageFields)) {
            $fields = array_merge($fields, $this->child->cachedImageFields);
        }
        foreach ($fields as $field) {
            // Ful image
            $image = $this->avatarCacheKey(false, $field);
            Cache::forget($image);

            // Thumb
            $image = $this->avatarCacheKey(true, $field);
            Cache::forget($image);
        }
    }

    /**
     * @param bool $thumb
     * @param string $field
     * @return string
     */
    protected function avatarCacheKey(bool $thumb, string $field): string
    {
        return 'entity_picture_' . $this->id . '_' . $field . ($thumb ? '_thumb' : null);
    }
}
