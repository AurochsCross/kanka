<?php

namespace App\Models;

use App\Services\FilterService;
use App\Traits\CampaignTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class CampaignDashboardWidget
 * @package App\Models
 *
 * @property integer $id
 * @property integer $campaign_id
 * @property integer $entity_id
 * @property int $dashboard_id
 * @property string $widget
 * @property string $config
 * @property integer $width
 * @property integer $position
 * @property Tag[] $tags
 * @property Entity $entity
 * @property CampaignDashboard $dashboard
 *
 * @method static self|Builder positioned()
 * @method static self|Builder onDashboard(CampaignDashboard $dashboard = null)
 */
class CampaignDashboardWidget extends Model
{
    /**
     * Widget Constants
     */
    const WIDGET_PREVIEW = 'preview';
    const WIDGET_RECENT = 'recent';
    const WIDGET_CALENDAR = 'calendar';
    const WIDGET_UNMENTIONED = 'unmentioned';
    const WIDGET_RANDOM = 'random';
    const WIDGET_HEADER = 'header';
    const WIDGET_CAMPAIGN = 'campaign';

    // Widgets that are automatically visible on the dashboard
    const WIDGET_VISIBLE = [
        self::WIDGET_RECENT,
        self::WIDGET_UNMENTIONED,
        self::WIDGET_RANDOM,
        self::WIDGET_HEADER,
    ];

    /**
     * Traits
     */
    use CampaignTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'campaign_id',
        'entity_id',
        'widget',
        'config',
        'position',
        'width',
        'is_full',
        'dashboard_id',
    ];

    protected $casts = [
        'config' => 'Array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity()
    {
        return $this->belongsTo(\App\Models\Entity::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dashboard()
    {
        return $this->belongsTo(\App\Models\CampaignDashboard::class, 'dashboard_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(
            'App\Models\Tag',
            'campaign_dashboard_widget_tags',
            'widget_id',
            'tag_id',
            'id',
            'id'
        );
    }

    /**
     * Get the column size
     * @return int
     */
    public function colSize(): int
    {
        if ($this->widget == self::WIDGET_CAMPAIGN) {
            return 12;
        }
        if (!empty($this->width)) {
            return $this->width;
        }
        return ($this->widget == self::WIDGET_PREVIEW || $this->widget == self::WIDGET_RANDOM ||
            ($this->widget == self::WIDGET_RECENT && $this->conf('singular')))
            ? 4 : 6;
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePositioned($query)
    {
        return $query->with(['entity', 'tags'])
            ->orderBy('position', 'asc');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnDashboard(Builder $query, CampaignDashboard $dashboard = null)
    {
        if (empty($dashboard)) {
            return $query->whereNull('dashboard_id');
        }

        return $query->where('dashboard_id', $dashboard->id);
    }

    /**
     * @param $value
     */
    public function conf($value)
    {
        return Arr::get($this->config, $value, null);
    }


    /**
     * Used by the API to get models updated since a previous date
     * @param $query
     * @param $lastSync
     * @return mixed
     */
    public function scopeLastSync(Builder $query, $lastSync)
    {
        if (empty($lastSync)) {
            return $query;
        }
        return $query->where('updated_at', '>', $lastSync);
    }

    /**
     * Copy an dashboard to another target
     * @param CampaignDashboard $target
     */
    public function copyTo(CampaignDashboard $target)
    {
        $new = $this->replicate(['dashboard_id']);
        $new->dashboard_id = $target->id;
        return $new->save();
    }

    /**
     * @return bool
     */
    public function hasAdvancedOptions(): bool
    {
        return $this->conf('attributes') == 1 || $this->conf('members') == '1' || $this->conf('entity-header') == '1';
    }

    /**
     * @return bool
     */
    public function showAttributes(): bool
    {
        if ($this->widget != self::WIDGET_PREVIEW) {
            return false;
        }

        return $this->conf('attributes') == '1' && !empty($this->entity);
    }
    /**
     * @return bool
     */
    public function showMembers(): bool
    {
        if ($this->widget != self::WIDGET_PREVIEW || $this->conf('members') !== '1') {
            return false;
        }
        $types = [
            config('entities.ids.family'),
            config('entities.ids.organisation'),
        ];

        return !empty($this->entity) && in_array($this->entity->typeId(), $types);
    }

    /**
     * Get the entities of a widget
     * @param int $offset
     * @return Entity[]|Builder[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function entities($offset = 0)
    {
        $entityIds = [];


        $base = null;

        if ($this->widget == self::WIDGET_UNMENTIONED) {
            $excludedTypes = [];
            if (empty($entityType)) {
                $excludedTypes = [
                    'tags',
                    'conversation',
                    'attribute_template'
                ];
            }
            $base = \App\Models\Entity::unmentioned()
                ->whereNotIn('type', $excludedTypes)
            ;
        } else {
            $base = \App\Models\Entity::recentlyModified();
        }

        // If an entity type is provided, we can combine that with filters. We need to get the list of the misc
        // ids first to pass on to the entity query.
        $entityType = $this->conf('entity');
        if (!empty($entityType) && !empty($this->config['filters'])) {

            $className = 'App\Models\\' . Str::studly($entityType);
            /** @var MiscModel $model */
            $model = new $className();

            /** @var FilterService $filterService */
            $filterService = app()->make('App\Services\FilterService');
            $filterService->make($entityType, $this->filterOptions(), $model);

            $models = $model->select('id')
                ->filter($filterService->filters())
                ->get();

            $entityIds = $models->pluck('id');

            // Add the filter to the base query
            $base = $base->whereIn('entity_id', $entityIds);
        }

        return $base
            ->inTags($this->tags->pluck('id')->toArray())
            ->type($entityType)
            ->acl()
            ->with(['tags', 'updater', 'image'])
            ->take(10)
            ->offset($offset)
            ->get();
    }

    /**
     * Get the widget filters
     * @return array
     */
    private function filterOptions(): array
    {
        $filters = [];
        if (empty($this->config['filters'])) {
            return $filters;
        }

        $segments = explode('&', $this->config['filters']);
        foreach ($segments as $segment) {
            $params = explode('=', $segment);
            $filters[$params[0]] = $params[1];
        }

        return $filters;
    }
}
