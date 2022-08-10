<?php

namespace App\Models;

use App\Facades\CampaignLocalization;
use App\Facades\Mentions;
use App\Models\Concerns\Acl;
use App\Models\Concerns\Nested;
use App\Models\Concerns\SortableTrait;
use App\Traits\CampaignTrait;
use App\Traits\ExportableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

/**
 * Class Ability
 * @package App\Models
 * @property int $ability_id
 * @property string $charges
 * @property Ability $ability
 * @property Ability[] $descendants
 * @property Ability[] $abilities
 */
class Ability extends MiscModel
{
    use CampaignTrait,
        ExportableTrait,
        Nested,
        SoftDeletes,
        Acl,
        SortableTrait
    ;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'type',
        'entry',
        'image',
        'ability_id',
        'is_private',
        'charges'
    ];

    /**
     * Searchable fields
     * @var array
     */
    protected $searchableColumns = ['name', 'entry'];

    protected $sortable = [
        'name',
        'type',
        'ability.name',
    ];

    /**
     * Fields that can be sorted on
     * @var array
     */
    protected $sortableColumns = [
        'ability.name',
    ];

    /**
     * Nullable values (foreign keys)
     * @var array
     */
    public $nullableForeignKeys = [
        'ability_id',
    ];

    /**
     * Entity type
     * @var string
     */
    protected $entityType = 'ability';

    /**
     * Parent ID used for the Node Trait
     * @return string
     */
    public function getParentIdName()
    {
        return 'ability_id';
    }

    /**
     * Specify parent id attribute mutator
     * @param $value
     */
    public function setAbilityIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    /**
     * Performance with for datagrids
     * @param $query
     * @return mixed
     */
    public function scopePreparedWith(Builder $query)
    {
        return $query->with([
            'entity' => function ($sub) {
                $sub->select('id', 'name', 'entity_id', 'type_id', 'image_uuid');
            },
            'entity.image' => function ($sub) {
                $sub->select('campaign_id', 'id', 'ext');
            },
            'ability' => function ($sub) {
                $sub->select('id', 'name');
            },
            'ability.entity' => function ($sub) {
                $sub->select('id', 'name', 'entity_id', 'type_id');
            },
            'abilities' => function ($sub) {
                $sub->select('id', 'name', 'ability_id');
            },
        ]);
    }

    /**
     * Only select used fields in datagrids
     * @return array
     */
    public function datagridSelectFields(): array
    {
        return ['ability_id'];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ability()
    {
        return $this->belongsTo('App\Models\Ability', 'ability_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abilities()
    {
        return $this->hasMany('App\Models\Ability', 'ability_id', 'id');
    }

    public function entities()
    {
        return $this->hasManyThrough(
            'App\Models\Entity',
            'App\Models\EntityAbility',
            'ability_id',
            'id',
            'id',
            'entity_id'
        );
    }

    /**
     * Detach children when moving this entity from one campaign to another
     */
    public function detach()
    {
        foreach ($this->abilities as $child) {
            $child->ability_id = null;
            $child->save();
        }

        return parent::detach();
    }

    /**
     * Menu items for the entity
     * @return array
     */
    public function menuItems(array $items = []): array
    {
        $campaign = CampaignLocalization::getCampaign();

        $items['second']['abilities'] = [
            'name' => 'abilities.show.tabs.abilities',
            'route' => 'abilities.abilities',
            'count' => $this->descendants()->count()
        ];
        $items['second']['entities'] = [
            'name' => 'abilities.show.tabs.entities',
            'route' => 'abilities.entities',
            'count' => $this->entities()->count()
        ];
        return parent::menuItems($items);
    }

    /**
     * Get the entity_type id from the entity_types table
     * @return int
     */
    public function entityTypeId(): int
    {
        return (int) config('entities.ids.ability');
    }

    /**
     * @return mixed
     */
    public function entryWithAttributes()
    {
        return Mentions::map($this);
    }

    /**
     * Attach an entity to the tag
     * @param array $request
     * @return bool
     */
    public function attachEntity(array $request): bool
    {
        $entityId = Arr::get($request, 'entity_id');
        $entity = Entity::with('abilities')->findOrFail($entityId);

        // Make sure the tag isn't already attached to the entity
        foreach ($entity->abilities as $ability) {
            if ($ability->ability_id == $this->id) {
                return true;
            }
        }

        $entityAbility = EntityAbility::create([
            'ability_id' => $this->id,
            'entity_id' => $entityId,
            'visibility' => Arr::get($request, 'visibility', 'all'),
        ]);

        return $entityAbility !== false;
    }

    /**
     * Determine if the model has profile data to be displayed
     * @return bool
     */
    public function showProfileInfo(): bool
    {
        if ($this->type || $this->charges) {
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
            'ability_id',
        ];
    }
}
