<?php

namespace App\Models;

use App\Models\Concerns\Acl;
use App\Models\Concerns\Nested;
use App\Models\Concerns\SortableTrait;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Event
 * @package App\Models
 *
 * @property int $event_id
 * @property int $location_id
 * @property string $date
 * @property Location $location
 * @property Event $event
 * @property Event[] $events
 * @property Event[] $descendants
 */
class Event extends MiscModel
{
    use CampaignTrait,
        ExportableTrait,
        SoftDeletes,
        Nested,
        SortableTrait,
        Acl
    ;

    /**
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'name',
        'slug',
        'type',
        'image',
        'date',
        'entry',
        'is_private',
        'location_id',
        'event_id',
    ];

    protected $sortable = [
        'name',
        'date',
        'type',
        'event.name',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'date',
        'location.name',
    ];

    /**
     * Nullable values (foreign keys)
     * @var array
     */
    public $nullableForeignKeys = [
        'location_id',
        'event_id',
    ];

    /**
     * Performance with for datagrids
     * @param $query
     * @return mixed
     */
    public function scopePreparedWith(Builder $query)
    {
        return $query->with([
            'entity',
            'entity.image',
            'location',
            'location.entity',
            'event',
            'event.entity'
        ]);
    }

    /**
     * Only select used fields in datagrids
     * @return array
     */
    public function datagridSelectFields(): array
    {
        return ['location_id', 'event_id', 'date'];
    }

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'event';

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns  = ['name', 'entry', 'type'];

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
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'event_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function events()
    {
        return $this->hasMany('App\Models\Event', 'event_id', 'id');
    }

    /**
     * Get the entity_type id from the entity_types table
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) config('entities.ids.event');
    }

    /**
     * @return string
     */
    public function getParentIdName()
    {
        return 'event_id';
    }
    /**
     * Specify parent id attribute mutator
     * @param $value
     */
    public function setEventIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    /**
     * @return array
     */
    public function menuItems(array $items = []): array
    {
        $items['second']['events'] = [
            'name' => 'events.fields.events',
            'route' => 'events.events',
            'count' => $this->descendants()->count()
        ];

        return parent::menuItems($items);
    }

    /**
     * Determine if the model has profile data to be displayed
     * @return bool
     */
    public function showProfileInfo(): bool
    {
        if (!empty($this->type)) {
            return true;
        }

        if ($this->location) {
            return true;
        }

        return false;
    }

    /**
     * Define the fields unique to this model that can be used on filters
     * @return string[]
     */
    public function filterableColumns(): array
    {
        return [
            'date',
            'location_id',
            'event_id',
        ];
    }
}
