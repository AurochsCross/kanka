<?php

namespace App\Models;

use App\Facades\CampaignLocalization;
use App\Models\Concerns\Acl;
use App\Models\Concerns\Nested;
use App\Models\Concerns\SortableTrait;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Exception;

/**
 * Class Location
 * @package App\Models
 * @property string $name
 * @property string $type
 * @property string $entry
 * @property string $image
 * @property string|null $map
 * @property boolean $is_private
 * @property boolean $is_map_private
 * @property integer|null $parent_location_id
 * @property Location|null $parentLocation
 * @property Map[]|Collection $maps
 * @property Location[]|Collection $descendants
 * @property Location[]|Collection $locations
 * @property Character[]|Collection $characters
 * @property Organisation[]|Collection $organisations
 * @property Family[]|Collection $families
 * @property Item[]|Collection $items
 * @property MapPoint[]|Collection $mapPoints
 */
class Location extends MiscModel
{
    use CampaignTrait,
        ExportableTrait,
        Nested,
        SoftDeletes,
        SortableTrait,
        Acl
    ;


    /** @var string[]  */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'image',
        'map',
        'entry',
        'parent_location_id',
        'campaign_id',
        'is_private',
        'is_map_private',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'map',
        'parentLocation.name',
    ];

    protected $sortable = [
        'name',
        'type',
        'location.name',
    ];

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'location';

    /**
     * Nullable values (foreign keys)
     * @var string[]
     */
    public $nullableForeignKeys = [
        'parent_location_id',
    ];

    public $cachedImageFields = ['map'];

    /**
     * @return string
     */
    public function getParentIdName()
    {
        return 'parent_location_id';
    }

    /**
     * Performance with for datagrids
     * @param Builder $query
     * @return Builder
     */
    public function scopePreparedWith(Builder $query): Builder
    {
        return $query->with([
            'entity' => function ($sub) {
                $sub->select('id', 'name', 'entity_id', 'type_id', 'image_uuid');
            },
            'entity.image' => function ($sub) {
                $sub->select('campaign_id', 'id', 'ext');
            },
            'parentLocation' => function ($sub) {
                $sub->select('id', 'name');
            },
            'parentLocation.entity' => function ($sub) {
                $sub->select('id', 'name', 'entity_id', 'type_id');
            },
            'locations' => function ($sub) {
                $sub->select('id', 'parent_location_id');
            },
            'characters' => function ($sub) {
                $sub->select('id', 'location_id');
            },
            'races'
        ]);
    }

    /**
     * Only select used fields in datagrids
     * @return array
     */
    public function datagridSelectFields(): array
    {
        return ['parent_location_id'];
    }

    /**
     *
     */
    public function parentLocation()
    {
        return $this->belongsTo('App\Models\Location', 'parent_location_id', 'id');
    }

    /**
     * Parent Location
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'parent_location_id', 'id');
    }

    /**
     *
     */
    public function characters()
    {
        return $this->hasMany('App\Models\Character', 'location_id', 'id');
    }

    /**
     */
    public function races()
    {
        return $this->belongsToMany('App\Models\Race', 'race_location');
    }

    /**
     */
    public function creatures()
    {
        return $this->belongsToMany('App\Models\Creature', 'creature_location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locationAttributes()
    {
        return $this->hasMany('App\Models\LocationAttribute', 'location_id', 'id');
    }

    /**
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item', 'location_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maps()
    {
        return $this->hasMany('App\Models\Map', 'location_id', 'id')
            ->select(['id', 'name']);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany('App\Models\Location', 'parent_location_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event', 'location_id', 'id');
    }

    /**
     * Get all characters in the location and descendants
     */
    public function allCharacters()
    {
        $locationIds = [$this->id];
        foreach ($this->descendants as $descendant) {
            $locationIds[] = $descendant->id;
        };

        $table = new Character();
        return Character::whereIn($table->getTable() . '.location_id', $locationIds)->with('location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function families()
    {
        return $this->hasMany('App\Models\Family', 'location_id', 'id');
    }

    /**
     * Get all families in the location and descendants
     */
    public function allFamilies()
    {
        $locationIds = [$this->id];
        foreach ($this->descendants as $descendant) {
            $locationIds[] = $descendant->id;
        };

        $table = new Family();
        return Family::whereIn($table->getTable() . '.location_id', $locationIds)->with('location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function journals()
    {
        return $this->hasMany('App\Models\Journal', 'location_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function organisations()
    {
        return $this->hasMany('App\Models\Organisation', 'location_id', 'id');
    }

    /**
     * Get all characters in the location and descendants
     */
    public function allOrganisations()
    {
        $locationIds = [$this->id];
        foreach ($this->descendants as $descendant) {
            $locationIds[] = $descendant->id;
        };

        return Organisation::whereIn('location_id', $locationIds)->with('location');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapPoints()
    {
        return $this->hasMany('App\Models\MapPoint', 'location_id', 'id');
    }

    /**
     * Specify parent id attribute mutator
     * @param int $value
     */
    public function setParentLocationIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    /**
     * Detach children when moving this entity from one campaign to another
     */
    public function detach()
    {
        foreach ($this->characters as $child) {
            $child->location_id = null;
            $child->save();
        }

        foreach ($this->locations as $child) {
            $child->parent_location_id = null;
            $child->save();
        }

        foreach ($this->organisations as $child) {
            $child->location_id = null;
            $child->save();
        }

        foreach ($this->families as $child) {
            $child->location_id = null;
            $child->save();
        }

        foreach ($this->items as $child) {
            $child->location_id = null;
            $child->save();
        }

        // Remove all the map points as they wouldn't make any sense in the new campaign
        foreach ($this->mapPoints as $child) {
            $child->delete();
        }

        return parent::detach();
    }

    /**
     * Quick check to see if the image might be an svg
     * @return bool
     */
    public function isMapSvg(): bool
    {
        return (substr(strtolower($this->map), -4) == '.svg');
    }

    /**
     * Get the size of the svg image
     * @return int
     */
    public function mapWidth(): int
    {
        if (empty($this->map) || !$this->isMapSvg()) {
            return 0;
        }
        try {
            $content = Storage::get($this->map);
            $xml = simplexml_load_string($content);

            return (int) $xml->attributes()->width;
        } catch (Exception $e) {
            return 100;
        }

    }


    /**
     * @return array
     */
    public function menuItems(array $items = []): array
    {
        $campaign = CampaignLocalization::getCampaign();

        if (!empty($this->map)) {
            if (!$this->is_map_private || (auth()->check() && auth()->user()->can('map', $this))) {
                $items['second']['map'] = [
                    'name' => 'locations.show.tabs.map',
                    'route' => 'locations.map',
                ];
            }
        }

        $count = $this->descendants()->has('location')->count();
        if ($count > 0) {
            $items['second']['locations'] = [
                'name' => 'locations.show.tabs.locations',
                'route' => 'locations.locations',
                'count' => $count
            ];
        }

        $count = $this->allCharacters()->count();
        if ($campaign->enabled('characters') && $count > 0) {
            $items['second']['characters'] = [
                'name' => 'locations.show.tabs.characters',
                'route' => 'locations.characters',
                'count' => $count
            ];
        }
        /*$count = $this->events()->count();
        if ($campaign->enabled('events') && $count > 0) {
            $items['second']['events'] = [
                'name' => 'locations.show.tabs.events',
                'route' => 'locations.events',
                'count' => $count
            ];
        }*/
        return parent::menuItems($items);
    }

    /**
     * @return array
     */
    public function legend(): array
    {
        $sortedPoints = [];
        $points = $this->mapPoints()->with(['targetEntity', 'location'])->get();
        /** @var MapPoint $point */
        foreach ($points as $point) {
            if ($point->visible()) {
                $sortedPoints[] = $point;
            }
        }
        usort($sortedPoints, function($a, $b) {
            return strcmp($a->label(), $b->label());
        });
        return $sortedPoints;
    }

    /**
     * Get the entity_type id from the entity_types table
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) config('entities.ids.location');
    }

    /**
     * If the profile is shown
     * @return bool
     */
    public function showProfileInfo(): bool
    {
        return  !empty($this->type) || !$this->maps->isEmpty() || !$this->entity->elapsedEvents->isEmpty();
    }

    /**
     * Define the fields unique to this model that can be used on filters
     * @return string[]
     */
    public function filterableColumns(): array
    {
        return [
            'parent_location_id',
        ];
    }
}
