<?php

namespace App\Models;

use App\Facades\CampaignLocalization;
use App\Facades\Mentions;
use App\Models\Concerns\Blameable;
use App\Models\Concerns\Paginatable;
use App\Traits\SourceCopiable;
use App\Traits\VisibilityIDTrait;
use App\Models\Concerns\SortableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class MapMarker
 * @package App\Models
 *
 * @property Map $map
 * @property Entity|null $entity
 * @property int $id
 * @property int $map_id
 * @property int|null $entity_id
 * @property string $name
 * @property string $entry
 * @property int $longitude
 * @property int $latitude
 * @property string $colour
 * @property string $font_colour
 * @property int|null $shape_id
 * @property int|null $size_id
 * @property int|null $icon
 * @property string $custom_icon
 * @property string $custom_shape
 * @property int|null $circle_radius
 * @property bool $is_draggable
 * @property array $polygon_style
 * @property float $opacity
 * @property int|null $group_id
 * @property int|null $pin_size
 * @property MapGroup|null $group
 */
class MapMarker extends Model
{
    use Blameable, VisibilityIDTrait, Paginatable, SourceCopiable, SortableTrait;

    public const SHAPE_MARKER = 1;
    public const SHAPE_LABEL = 2;
    public const SHAPE_CIRCLE = 3;
    public const SHAPE_POLY = 5;

    /** @var string[]  */
    protected $fillable = [
        'map_id',
        'name',
        'entry',
        'visibility_id',
        'entity_id',
        'type_id',
        'size_id',
        'shape_id',
        'icon',
        'custom_icon',
        'custom_shape',
        'is_draggable',
        'colour',
        'font_colour',
        'longitude',
        'latitude',
        'opacity',
        'group_id',
        'pin_size',
        'circle_radius',
        'polygon_style',
    ];

    protected $sortable = [
        'name',
        'entity_id',
        'type',
        'icon',
        'group.name',
        'visibility',
    ];

    public $casts = [
        'polygon_style' => 'array',
    ];

    /** @var bool If set to false, skip the saving observer */
    public $savingObserver = true;

    /** @var bool Editing the map */
    protected $editing = false;

    /** @var bool Exploring the map */
    protected $exploring = false;

    /** @var string Marker MouseOver Popup on explore */
    protected $tooltipPopup = '';

    /** @var int size multiplier for circles */
    protected $sizeMultiplier = 1;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function map()
    {
        return $this->belongsTo(Map::class, 'map_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(Entity::class, 'entity_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(MapGroup::class, 'group_id');
    }

    /**
     * Get the marker's size, and make it 20 times bigger for a "pixel" size equivalent
     * @return int
     */
    public function size(): int
    {
        return ($this->size_id * 20) + 20;
    }

    /**
     * Determine if the marker is of the label type
     * @return bool
     */
    public function isLabel(): bool
    {
        return $this->shape_id == self::SHAPE_LABEL;
    }

    /**
     * Determine if the marker is of the circle type
     * @return bool
     */
    public function isCircle(): bool
    {
        return $this->shape_id == self::SHAPE_CIRCLE;
    }

    /**
     * Determine if the marker is of the polygon type and has a custom shape
     * @return bool
     */
    public function isPolygon(): bool
    {
        return $this->shape_id == MapMarker::SHAPE_POLY && !empty($this->custom_shape);
    }

    /**
     * Determine the type of the marker
     * @return string
     */
    public function typeLabel(): string
    {
        if ($this->isPolygon()) {
            return __('maps/markers.tabs.polygon');
        } elseif ($this->isLabel()) {
            return __('maps/markers.tabs.label');
        } elseif ($this->isCircle()) {
            return __('maps/markers.tabs.circle');
        }
        return __('maps/markers.tabs.marker');
    }

    /**
     * Determine the icon of the marker for the datagrid.
     * @return string
     */
    public function datagridMarkerIcon(): string
    {
        if (in_array($this->shape_id, [2,3,5])) {
            return '';
        }

        $icon = '<i class="fa-solid fa-map-pin"></i>';

        $campaign = CampaignLocalization::getCampaign();
        if (!empty($this->custom_icon) && $campaign->boosted()) {
            if (Str::startsWith($this->custom_icon, '<i ')) {
                $icon = $this->custom_icon ;
            } elseif (Str::startsWith($this->custom_icon, ['fa-', 'ra '])) {
                $icon = ' <i class="' . $this->custom_icon . '" aria-hidden="true"></i>';
            } elseif (Str::startsWith($this->custom_icon, '<?xml')) {
                $icon = '<div class="custom-icon"><img src="' . $this->resizedCustomIcon() . '" /></div>';
            }
        } elseif ($this->icon == 2) {
            $icon = '<i class="fa-solid fa-question"></i>';
        } elseif ($this->icon == 3) {
            $icon = '<i class="fa-solid fa-exclamation"></i>';
        }

        return $icon;
    }

    /**
     * Generate the marker for leaflet
     * @return string
     */
    public function marker(): string
    {
        if ($this->shape_id == MapMarker::SHAPE_CIRCLE) {
            return $this->circleMarker();
        } elseif ($this->isLabel()) {
            return $this->labelMarker();
        } elseif ($this->isPolygon()) {
            $coords = [];
            $segments = explode(' ', str_replace("\r\n", " ", $this->custom_shape));
            foreach ($segments as $segment) {
                $coord = explode(',', $segment);
                if (!empty($coord[0]) && !empty($coord[1])) {
                    $coords[] = '[' . $coord[0] . ', ' . Str::before($coord[1], ' ') . ']';
                }
            }
            return 'L.polygon([' . implode(', ', $coords) . '], {
                color: \'' . Arr::get($this->polygon_style, 'stroke', $this->colour) . '\',
                weight: ' . max(1, Arr::get($this->polygon_style, 'stroke-width', 1)) . ',
                opacity: ' . $this->strokeOpacity() . ',
                fillOpacity: ' . $this->floatOpacity() . ',
                fillColor: \'' . e($this->colour) . '\',
                smoothFactor: 1,
                linecap: \'round\',
                linejoin: \'round\',
            })' . $this->popup();
        }

        return 'L.marker([' . $this->latitude . ', ' . $this->longitude . '], {
            title: \'' . $this->markerTitle() . '\',
            opacity: ' . $this->floatOpacity() . ','
            . ($this->isDraggable() ? 'draggable: true,' : null) . '
            ' . $this->markerIcon() . '
        })' . $this->popup() . $this->draggable();
    }

    /**
     * Generate a circle marker
     * @return string
     */
    protected function circleMarker(): string
    {
        return 'L.circle([' . $this->latitude . ', ' . $this->longitude . '], {
                radius: ' . $this->circleRadius() . ',
                fillColor: \'' . e($this->colour) . '\',
                title: \'' . $this->markerTitle() . '\',
                stroke: false,
                fillOpacity: ' . $this->floatOpacity() . ',
                className: \'marker marker-circle marker-' . $this->id . ' size-' . $this->size_id . '\','
            . ($this->isDraggable() ? 'draggable: true' : null) . '
            })' . $this->popup();
    }

    /**
     * Generate a label marker
     * @return string
     */
    protected function labelMarker(): string
    {
        return 'L.marker([' . $this->latitude . ', ' . $this->longitude . '], {
                opacity: 0,
                icon: labelShapeIcon,'
            . ($this->editing ? null : null) . '
            }).bindTooltip(`' . str_replace('`', '\'', $this->markerTitle()) . '`, {
                direction: \'center\',
                permanent: true,
                offset: [0,0]
            })' . $this->popup();
    }

    /**
     * Generate the marker's popup that is usually opened on hover
     * @return string
     */
    protected function popup(): string|null
    {
        if ($this->editing) {
            return null;
        }

        $body = null;
        if (!empty($this->entity)) {
            if (!empty($this->name)) { // Name is set, include link to the entity
                $url = $this->entity->url();
                if ($this->entity->isMap()) {
                    $url = $this->entity->url('explore');
                }
                $body .= "<p><a href=\"$url\">" . str_replace('`', '\'', $this->entity->name) . "</a></p>";
            }
            // No entry field, include the entity tooltip
            if (!$this->isLabel()) {
                $body .= $this->entity->mappedPreview();
                // Replace backslashes because javascript can think that things like \6e is an octogonal string
                $body = str_replace('\\', '/', $body);
            }
        }

        // When exploring, we want the texts to be slightly shorter, to avoid lots of jittering on maps
        if ($this->exploring) {
            $body = Str::limit($body, 300);
            return '.bindPopup(`
            <div class="marker-popup-content">
                <h4 class="marker-header">' . str_replace('`', '\'', $this->markerTitle(true)) . '</h4>
                ' . (!empty($this->entry) ? '<p class="marker-text">' . Str::limit(Mentions::mapAny($this), 300) . '</p>' : null) . '
            </div>
            <div class="marker-popup-entry">
                ' . $body . '
            </div>`)
                ' . $this->tooltipPopup . '
            .on(`click`, function (ev) {
                window.markerDetails(`' . route('maps.markers.details', [$this->map_id, $this->id]) . '`)
            })';
        }

        return '.bindPopup(`
            <div class="marker-popup-content">
                <h4 class="marker-header">' . str_replace('`', '\'', $this->markerTitle(true)) . '</h4>
                ' . (!empty($this->entry) ? '<p class="marker-text">' . Mentions::mapAny($this) . '</p>' : null) . '
            </div>
            ' . $body . '
            <div class="marker-popup-actions">
                <a href="' . route('maps.map_markers.edit', [$this->map_id, $this->id]). '" class="btn btn-xs btn-primary">' . __('crud.edit') . '</a>
                <a href="' . route('maps.map_markers.create', [$this->map_id, 'source' => $this->id]). '" class="btn btn-xs btn-primary">' . __('crud.actions.copy') . '</a>

                <a href="#" class="btn btn-xs btn-danger delete-confirm" data-toggle="modal" data-name="' .
                    str_replace('`', '\'', $this->markerTitle(false)) .'"
                        data-target="#delete-confirm" data-delete-target="delete-form-marker-' . $this->id . '"
                        title="' . __('crud.remove') . '">
                    ' . __('crud.remove') . '
                </a>
            </div>`
        )';
    }

    /**
     * Determine if a marker is draggable
     * @return bool
     */
    protected function isDraggable(): bool
    {
        if (!auth()->check()) {
            return false;
        }
        return $this->editing || ($this->exploring && $this->is_draggable);
    }

    /**
     * Generate the draggable event for a marker
     * @return string
     */
    protected function draggable(): string
    {
        if (!$this->isDraggable()) {
            return '';
        }

        // Exploring and moving? Update through ajax
        if ($this->exploring && $this->is_draggable) {
            return '.on(`dragstart`, function() {
                this.closePopup();
            })

            .on(\'dragend\', function() {
                var coordinates = marker' . $this->id . '.getLatLng();
                console.log(`dragend`, coordinates);
                $.ajax({
                    url: `' . route('maps.markers.move', [$this->map_id, $this->id]) . '`,
                    type: `post`,
                    data: {latitude: coordinates.lat.toFixed(3), longitude: coordinates.lng.toFixed(3)}
                }).done(function (data) {
                    console.log(`moved marker`);
                });
            })';
        }

        return '.on(\'dragend\', function() {
            var coordinates = marker' . $this->id . '.getLatLng();
            //console.log(\'coords\', coordinates);
            //console.log(\'new coords\', coordinates.lat, coordinates.lng);

            var shapeId = $(\'input[name="shape_id"]\').val();
            var polyCoords = $(\'textarea[name="custom_shape"]\');
            //console.log(\'shape id\', shapeId);
            if (shapeId == "5") {
                //console.log(\'poly\', polyCoords.val());
                polyCoords.val(polyCoords.val() + \' \' + coordinates.lat.toFixed(3) + \',\' + coordinates.lng.toFixed(3));
            } else {
                $(\'#marker-latitude\').val(coordinates.lat.toFixed(3));
                $(\'#marker-longitude\').val(coordinates.lng.toFixed(3));
            }
        })';
    }

    /**
     * Marker icon as shown in explore and edit mode
     * @return string
     */
    protected function markerIcon(): string
    {
        if ($this->icon == 5) {
            return '';
        }

        $iconStyles = [];
        $iconStyles[] = 'background-color: ' . $this->backgroundColour();
        /*if ($this->entity && $this->icon == 4 && $this->entity->child) {
            $entityImage = '<div class="marker-entity" style="background-image: url(' .
                $this->entity->child->thumbnail(400) .
            ');"></div>';
        }*/

        $iconShape = '<div style="background-color: ' . $this->backgroundColour() . '" class="marker-pin"></div>';

        $icon = '`' . $iconShape . '<i class="fa-solid fa-map-pin"></i>`';

        $campaign = CampaignLocalization::getCampaign();
        if (!empty($this->custom_icon) && $campaign->boosted()) {
            if (Str::startsWith($this->custom_icon, '<i ')) {
                $icon = '`' . $iconShape . $this->custom_icon . '`';
            } elseif (Str::startsWith($this->custom_icon, ['fa-', 'ra '])) {
                $icon = '`' . $iconShape . ' <i class="' . $this->custom_icon . '" aria-hidden="true"></i>`';
            } elseif (Str::startsWith($this->custom_icon, '<?xml')) {
                $icon = 'L.Util.template(`<div class="custom-icon">' . $this->resizedCustomIcon() . '</div>`)';
            }
        } elseif ($this->icon == 2) {
            $icon = '`' . $iconShape . '<i class="fa-solid fa-question"></i>`';
        } elseif ($this->icon == 3) {
            $icon = '`' . $iconShape . '<i class="fa-solid fa-exclamation"></i>`';
        } elseif ($this->icon == 4) {
            $icon = '`' . $iconShape . '`';
        }

        //dd($this->pin_size ?: 40);
        $size = (int) $this->pinSize(false);

        return 'icon: L.divIcon({
                html: ' . $icon . ',
                iconSize: [' . $size . ', ' . $size . '],
                iconAnchor: [' . ceil($size / 2) . ', ' . ($size + ceil($size / 4)) . '],
                popupAnchor: [0, -' . ($size + ceil($size / 4)) . '],
                className: \'marker marker-' . $this->id . '\'
        })';
    }

    /**
     * @param bool $withPx
     * @return string
     */
    public function pinSize(bool $withPx = true): string
    {
        $size = max(10, $this->pin_size ?: 40);
        return (string) $size . ($withPx ? 'px' : null);
    }

    /**
     * The name of the marker: name or entity
     * @param bool $link = false
     * @return string
     */
    public function markerTitle(bool $link = false): string
    {
        if (empty($this->name) && !empty($this->entity)) {
            if ($link) {
                $url = $this->entity->url();
                if ($this->entity->isMap()) {
                    $url = $this->entity->url('explore');
                }
                return '<a href="' . $url . '">' . e($this->entity->name) . '</a>';
            }
            return str_replace("'", "\'", $this->entity->name);
        }
        return $link ? e($this->name) : str_replace("'", "\'", $this->name);
    }

    /**
     * Set the current mode to editing the marker
     * @return $this
     */
    public function editing(): self
    {
        $this->editing = true;
        return $this;
    }

    /**
     * Set the current mode to exploring the map
     * @param bool $popup = true
     * @return $this
     */
    public function exploring(bool $popup = true): self
    {
        $this->exploring = true;
        if ($popup == true) {
            $this->tooltipPopup = '.on(`mouseover`, function (ev) {this.openPopup();})';
        }
        return $this;
    }

    /**
     * Used for calculating sizes and distances when using open street map where everything is way more
     * zoomed in.
     * @return $this
     */
    public function multiplier(bool $isReal = false): self
    {
        $this->sizeMultiplier = $isReal ? 50 : 1;
        return $this;
    }

    /**
     * Get the opacity of a point. Users input a %, convert it to a float for leaflet
     * @return float
     */
    protected function floatOpacity(): float
    {
        if ($this->opacity > 100) {
            return 1.0;
        }

        if (empty($this->opacity) && $this->editing) {
            return 0.5;
        }


        return round($this->opacity / 100, 1);
    }

    /**
     * Get the polygon's stroke opacity
     * @return float
     */
    protected function strokeOpacity(): float
    {
        $opacity = Arr::get($this->polygon_style, 'stroke-opacity');
        if (empty($opacity)) {
            return 1.0;
        }

        // The number is an int (1 to 100), but needs to be a float
        return round($opacity / 100, 1);
    }

    /**
     * Resize any custom svg icon to be limited in height and width to the pin
     * @return string
     */
    protected function resizedCustomIcon(): string
    {
        $resized = preg_replace('`(width|height)=\".*?\"`sui', '$1="32"', $this->custom_icon);
        $resized = str_replace('height="32"', 'height="32" style="margin-top: 4px;"', $resized);
        return $resized;
    }

    /**
     * Marker background colour
     * @return string
     */
    public function backgroundColour(): string
    {
        if (!empty($this->colour)) {
            return $this->colour;
        }

        // Entity with no image?
        if ($this->icon == 4 && empty($this->entity->child->image)) {
            return '#ccc';
        }

        if ($this->icon != 1 || !empty($this->custom_icon)) {
            return 'unset';
        }
        return '#ccc';
    }

    /**
     * Check if a marker is visible (pointing to an entity that shouldn't be visible)
     * @return bool
     */
    public function visible(): bool
    {
        $campaign = CampaignLocalization::getCampaign();
        if ($this->isPolygon() && !$campaign->boosted()) {
            return false;
        }
        // Part of a private group, don't show either
        if (!empty($this->group_id) && !$this->group) {
            return false;
        }
        return empty($this->entity_id) || (!empty($this->entity) && !empty($this->entity->child));
    }

    /**
     * Calculate the circle radius
     * @return int
     */
    protected function circleRadius(): int
    {
        if (!empty($this->circle_radius)) {
            return (int) $this->circle_radius * $this->sizeMultiplier;
        }
        return (int) ($this->size_id * 20) * ($this->size_id * $this->sizeMultiplier);
    }


    /**
     * Determine if the marker has a filled out entry
     * @return bool
     */
    public function hasEntry(): bool
    {
        // If all that's in the entry is two \n, then there is no real content
        $stripped = trim(preg_replace('/\s\s+/', ' ', $this->entry));
        return !empty($stripped);
    }

    /**
     * For legacy tinymce editor
     * @return bool
     */
    public function hasEntity(): bool
    {
        return false;
    }

    /**
     * Functions for the datagrid2
     * @return string
     */
    public function url(string $where): string
    {
        return 'maps.map_markers.' . $where;
    }
    public function routeParams(array $options = []): array
    {
        return [$this->map_id, $this->id];
    }
    public function routeCopyParams(array $options = []): array
    {
        return [$this->map_id, 'source' => $this->id];
    }
    /**
     * Patch an entity from the datagrid2 batch editing
     * @param array $data
     * @return bool
     */
    public function patch(array $data): bool
    {
        if (isset($data['group_id']) && $data['group_id'] == -1) {
            $data['group_id'] = null;
        }
        return $this->update($data);
    }

    /**
     * Override the get link
     * @return string
     */
    public function getLink(): string
    {
        return route('maps.map_markers.edit', ['map' => $this->map_id, $this->id]);
    }

    /**
     * Generate link for the datagrid
     * @param string|null $displayName
     * @return string
     */
    public function markerLink(string $displayName = null): string
    {
        return '<a href="' . $this->getLink() . '">' .
            (!empty($displayName) ? $displayName : e($this->name)) .
        '</a>';
    }
}
