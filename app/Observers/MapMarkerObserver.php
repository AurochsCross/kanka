<?php


namespace App\Observers;


use App\Facades\Mentions;
use App\Models\MapMarker;
use App\Facades\MapMarkerCache;
use enshrined\svgSanitize\Sanitizer;
use Illuminate\Support\Str;

class MapMarkerObserver
{
    /**
     * Purify trait
     */
    use PurifiableTrait;

    /**
     * @param MapMarker $mapMarker
     */
    public function saving(MapMarker $mapMarker)
    {
        if ($mapMarker->savingObserver === false) {
            return;
        }

        $mapMarker->name = $this->purify(Mentions::codify($mapMarker->name));
        $mapMarker->entry = $this->purify(Mentions::codify($mapMarker->entry));
        $mapMarker->opacity = round($mapMarker->opacity, 1);
        $mapMarker->custom_icon = $this->sanitizeCustomIcon($mapMarker);

        if ($mapMarker->size_id != 6) {
            $mapMarker->circle_radius = null;
        }
    }

    /**
     * @param MapMarker $mapMarker
     */
    public function saved(MapMarker $mapMarker)
    {
        $mapMarker->map->touch();
        MapMarkerCache::clearSuggestion();
    }

    /**
     * @param MapMarker $mapMarker
     */
    public function deleted(MapMarker $mapMarker)
    {
        $mapMarker->map->touch();
        MapMarkerCache::clearSuggestion();
    }

    /**
     * Sanitize the custom icon (i or svg html element)
     * @param MapMarker $mapMarker
     * @return string|null
     */
    protected function sanitizeCustomIcon(MapMarker $mapMarker)
    {
        if (empty($mapMarker->custom_icon)) {
            return null;
        }

        if (Str::startsWith($mapMarker->custom_icon, ['<svg', '<?xml'])) {
            $sanitizer = new Sanitizer();
            $cleanSvg = $sanitizer->sanitize($mapMarker->custom_icon);
            if ($cleanSvg !== false) {
                return $cleanSvg;
            } else { // @phpstan-ignore-line
                return null;
            }
        } elseif (Str::startsWith($mapMarker->custom_icon, ['<i ', 'fa-', 'ra '])) {
            return $this->purify($mapMarker->custom_icon);
        }

        return null;
    }
}
