<?php

namespace App\Models;

use App\Facades\EntityPermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class MapPoint
 * @package App\Models
 *
 * @property integer $id
 * @property integer $location_id
 * @property integer $target_entity_id
 * @property string $axis_x
 * @property string $axis_y
 * @property string|null $name
 * @property string $colour
 * @property int $size_id
 * @property int $shape_id
 * @property int $created_at
 * @property int $updated_at
 * @property string $icon
 *
 * @property Location|null $location
 * @property Entity|null $targetEntity
 */
class MapPoint extends Model
{
    /**
     * Acl setup
     */
    public $entityType = 'location';
    public $aclFieldName = 'location_id';

    const SHAPE_CIRCLE = 1;
    const SHAPE_SQUARE = 2;
    const SHAPE_TRIANGLE = 3;

    // 'standard','small','tiny','large','huge'
    const SIZE_STANDARD = 1;
    const SIZE_SMALL = 2;
    const SIZE_TINY = 3;
    const SIZE_LARGE = 4;
    const SIZE_HUGE = 5;

    public const ICON_ENTITY = 'entity';

    public $table = 'location_map_points';

    /**
     * Nullable values (foreign keys)
     * @var string[]
     */
    public $nullableForeignKeys = [
        'target_entity_id'
    ];

    /** @var string[]  */
    protected $fillable = [
        'location_id',
        'target_entity_id',
        'axis_x',
        'axis_y',
        'name',
        'colour',
        'shape_id',
        'size_id',
        'icon',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function targetEntity()
    {
        return $this->belongsTo('App\Models\Entity', 'target_entity_id');
    }

    /**
     * @return string
     */
    public function makePin()
    {
        $marker = '<i class="' . $this->icon() . '"></i>';
        $dataUrl = route('locations.map_points.show', [$this->location, $this->id]);
        $dataUpdateUrl = route('locations.map_points.edit', [$this->location, $this->id]);
        $dataMoveUrl = route('locations.map_points.move', [$this->location, $this->id]);
        $url = $this->hasTarget() ? $this->targetEntity->url() : '#';
        $style = 'top: ' . e($this->axis_y) . 'px; left: ' . e($this->axis_x) . 'px;';
        $title = 'title="' . e($this->name) . '"';
        $size = $this->percentageSize();

        if ($this->hasTarget()) {
            $title = 'data-url="' . route('entities.tooltip', $this->target_entity_id) . '" '
                . 'data-toggle="tooltip-ajax" '
                . 'data-id="' . $this->target_entity_id . '" ';
            if($this->icon == 'entity') {
                $style .= "background-image: url('" . $this->targetEntity->child->thumbnail() . "');";
                $marker = '';
            }
        }

        $class = ['point', $this->size(), ($this->shape_id == self::SHAPE_CIRCLE ? 'circle' : 'square')];
        if (!empty($this->colour) && $this->colour != 'none') {
            if (Str::startsWith($this->colour, '#')) {
                $style .= 'background-color: ' . $this->colour . ';';
                $style .= 'border-color: rgba(' . hexdec(substr($this->colour, 1, 2)) . ', ' . hexdec(substr($this->colour, 3, 2)) . ', ' . hexdec(substr($this->colour, 5, 2)) . ', 0.5);';
                $style .= 'box-shadow: 0 0 10px ' . $this->colour . ';';
            } else {
                $style .= 'background-color: ' . $this->colour . ';';
                $style .= 'box-shadow: 0 0 10px ' . $this->colour . ';';
            }

            $class[] = 'coloured';
        } else {
            $class[] = 'none';
        }

        return '<a id="map-point-' . $this->id . '" class="' . implode(' ', $class) . '"'
            . 'style="' . $style . '" href="' . $url . '" data-url-show="' . $dataUrl . '" '
            . 'data-url-modal="' . $dataUpdateUrl . '" '
            . $title
            . 'data-url-move="' . $dataMoveUrl . '" '
            . 'data-toggle="tooltip" data-html="true" data-top="' . $this->axis_y . '" '
            . 'data-left="' . $this->axis_x . '" data-size="' . $size . '"'
            . '>' . $marker . '</a>';
    }

    /**
     * @return bool
     */
    public function hasTarget()
    {
        return !empty($this->target_entity_id);
    }

    /**
     * @return string
     */
    public function icon()
    {
        $icon = $this->icon;
        if ($icon == 'pin' || ($icon == self::ICON_ENTITY && !$this->hasTarget())) {
            return 'fa-solid fa-map-pin';
        } else {
            $icon = 'ra ra-' . e($this->icon);
        }

        return $icon;
    }

    /**
     * Get the size in a percentage, where large is 100%
     * @return int
     */
    public function percentageSize(): int
    {
        if ($this->size_id == self::SIZE_LARGE) {
            return 100;
        } elseif ($this->size_id == self::SIZE_HUGE) {
            return 200;
        } elseif ($this->size_id == self::SIZE_SMALL) {
            return 25;
        } elseif ($this->size_id == self::SIZE_TINY) {
            return 10;
        }
        return 50;
    }

    /**
     * @return string
     */
    public function size(): string
    {
        if ($this->size_id == self::SIZE_LARGE) {
            return 'large';
        } elseif ($this->size_id == self::SIZE_HUGE) {
            return 'huge';
        } elseif ($this->size_id == self::SIZE_SMALL) {
            return 'small';
        } elseif ($this->size_id == self::SIZE_TINY) {
            return 'tiny';
        }
        return 'standard';
    }

    /**
     * Label of the map point (for legend)
     * @return string
     */
    public function label()
    {
        return $this->hasTarget() ? $this->targetEntity->name : $this->name;
    }

    /**
     * Determine if the user can view this map point
     * @return bool
     */
    public function visible(): bool
    {
        if ($this->hasTarget()) {
            return !empty($this->targetEntity) && !empty($this->targetEntity->child);
        }
        return true;
    }
}
