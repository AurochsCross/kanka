<?php

namespace App\Models;

use App\Models\Concerns\LastSync;
use App\Models\Concerns\Taggable;
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
 * @property array $config
 * @property integer $width
 * @property integer $position
 * @property Entity $entity
 * @property CampaignDashboard $dashboard
 *
 * @method static self|Builder positioned()
 * @method static self|Builder onDashboard(CampaignDashboard $dashboard = null)
 */
class CampaignDashboardWidget extends Model
{
    use Taggable, LastSync;

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

    /** @var string[]  */
    protected $fillable = [
        'campaign_id',
        'entity_id',
        'widget',
        'config',
        'position',
        'width',
        'dashboard_id',
    ];

    protected $casts = [
        'config' => 'array',
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
     * @param Builder $query
     * @return Builder
     */
    public function scopePositioned(Builder $query): Builder
    {
        return $query->with(['entity', 'tags:id'])
            ->orderBy('position', 'asc');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOnDashboard(Builder $query, CampaignDashboard $dashboard = null): Builder
    {
        if (empty($dashboard)) {
            return $query->whereNull('dashboard_id');
        }

        return $query->where('dashboard_id', $dashboard->id);
    }

    /**
     * @param string $value
     */
    public function conf($value)
    {
        return Arr::get($this->config, $value, null);
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
        return $this->conf('attributes') == 1 ||
            $this->conf('members') == '1' ||
            $this->conf('entity-header') == '1' ||
            $this->conf('relations') == '1'
        ;
    }

    /**
     * @return bool
     */
    public function showAttributes(): bool
    {
        if ($this->conf('attributes') != '1') {
            return false;
        }
        if (!in_array($this->widget, [self::WIDGET_PREVIEW, self::WIDGET_RECENT, self::WIDGET_RANDOM])) {
            return false;
        }
        if ($this->widget == self::WIDGET_RECENT) {
            return true;
        }

        return !empty($this->entity);
    }

    /**
     * @return bool
     */
    public function showRelations(): bool
    {
        if ($this->conf('relations') != '1') {
            return false;
        }
        if (!in_array($this->widget, [self::WIDGET_PREVIEW, self::WIDGET_RECENT, self::WIDGET_RANDOM])) {
            return false;
        }
        if ($this->widget == self::WIDGET_RECENT) {
            return true;
        }

        return !empty($this->entity);
    }

    /*
     * Show members of families and organisations
     * @param Entity|null $entity
     * @return bool
     */
    public function showMembers(Entity $entity = null): bool
    {
        if ($this->conf('members') !== '1') {
            return false;
        }
        if (!in_array($this->widget, [self::WIDGET_PREVIEW, self::WIDGET_RECENT, self::WIDGET_RANDOM])) {
            return false;
        }
        $types = [
            config('entities.ids.family'),
            config('entities.ids.organisation'),
        ];

        // Preview, check the linked entity
        $entity = !empty($entity) ? $entity : $this->entity;
        return $entity !== null && in_array($entity->typeId(), $types);
    }

    /**
     * Get the entities of a widget
     */
    public function entities()
    {
        $base = new Entity();

        $excludedTypes = [];

        if ($this->filterUnmentioned()) {
            $base = $base->unmentioned()
                ->whereNotIn($base->getTable() . '.type_id', $excludedTypes)
            ;
        } elseif ($this->filterMentionless()) {
            $base = $base->mentionless()
                ->whereNotIn($base->getTable() . '.type_id', $excludedTypes)
            ;
        }

        // Ordering
        $order = Arr::get($this->config, 'order', null);
        if (empty($order)) {
            $base = $base->recentlyModified();
        } else {
            list ($field, $order) = explode('_', $order);
            $base = $base->orderBy($field, $order);
        }

        // If an entity type is provided, we can combine that with filters. We need to get the list of the misc
        // ids first to pass on to the entity query.
        $entityType = $this->conf('entity');
        if (!empty($entityType) && !empty($this->config['filters'])) {

            $className = 'App\Models\\' . Str::studly($entityType);
            /** @var MiscModel|Character $model */
            $model = new $className();

            /** @var FilterService $filterService */
            $filterService = app()->make('App\Services\FilterService');
            $filterService
                ->session(false)
                ->make($entityType, $this->filterOptions(), $model);

            $models = $model
                ->select($model->getTable() . '.id')
                ->filter($filterService->filters())
                ->get();

            $entityIds = $models->pluck('id');

            // Add the filter to the base query
            $base = $base->whereIn('entities.entity_id', $entityIds);
        }

        $entityTypeID = (int) config('entities.ids.' . $entityType);
        return $base
            ->inTags($this->tags->pluck('id')->toArray())
            ->type($entityTypeID)
            ->with(['image:campaign_id,id,ext'])
            ->paginate(10)
        ;
    }

    /**
     * Get a random entity
     * Todo: refactor this code with the code from the quick link?
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function randomEntity()
    {
        $entityType = $this->conf('entity');
        $entityTypeID = (int) config('entities.ids.' . $entityType);

        $base = new Entity();

        if (!empty($entityType) && !empty($this->config['filters'])) {
            $className = 'App\Models\\' . \Illuminate\Support\Str::studly($entityType);
            /** @var \App\Models\MiscModel $model */
            $model = new $className();

            /** @var \App\Services\FilterService $filterService */
            $filterService = app()->make('App\Services\FilterService');
            $filterService
                ->session(false)
                ->make($entityType, $this->filterOptions(), $model);

            $models = $model
                ->select($model->getTable() . '.id')
                ->filter($filterService->filters())
                ->get();

            $entityIds = $models->pluck('id');

            // Add the filter to the base query
            $base = $base->whereIn('entities.entity_id', $entityIds);
        }

        return $base
            ->inTags($this->tags->pluck('id')->toArray())
            ->whereNotIn('type_id', [config('entities.ids.attribute_template'), config('entities.ids.conversation'), config('entities.ids.tag')])
            ->whereNotIn('entities.id', \App\Facades\Dashboard::excluding())
            ->type($entityTypeID)
            ->with(['image'])
            ->inRandomOrder()
            ->first();
    }

    /**
     * Get the widget filters
     * @return array
     */
    private function filterOptions(): array
    {
        if (empty($this->config['filters'])) {
            return [];
        }

        try {
            $filters = [];
            $segments = explode('&', $this->config['filters']);
            foreach ($segments as $segment) {
                $params = explode('=', $segment);
                $name = $params[0];
                if (Str::endsWith($name, '[]')) {
                    $filters[substr($name, 0, -2)][] = $params[1];
                    continue;
                }
                $filters[$params[0]] = $params[1];
            }

            return $filters;
        } catch (\Exception $e) {
            //Log::error('Widget error:' . $e->getMessage());
            return [];
        }
    }

    /**
     * A way to set the entity, typically for the random widget
     * @param Entity $entity
     * @return $this
     */
    public function setEntity(Entity $entity): self
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return string
     */
    public function widgetIcon(): string
    {
        $icon = null;
        if ($this->widget === self::WIDGET_RECENT) {
            $icon = 'fa-solid fa-list';
        } elseif ($this->widget === self::WIDGET_HEADER) {
            $icon = 'fa-solid fa-heading';
        } elseif ($this->widget === self::WIDGET_PREVIEW) {
            $icon = 'fa-solid fa-align-justify';
        } elseif ($this->widget === self::WIDGET_CALENDAR) {
            $icon = 'ra ra-moon-sun';
        } elseif ($this->widget === self::WIDGET_RANDOM) {
            $icon = 'fa-solid fa-dice-d20';
        } elseif ($this->widget === self::WIDGET_CAMPAIGN) {
            $icon = 'fa-solid fa-th-list';
        }

        if (empty($icon)) {
            return '';
        }
        return '<i class="' . $icon . '"></i>';
    }

    /**
     * @param Campaign $campaign
     * @return string
     */
    public function customClass(Campaign $campaign): string
    {
        if (!$campaign->boosted()) {
            return '';
        }
        if (empty($this->conf('class'))) {
            return '';
        }

        return (string) $this->conf('class');
    }

    /**
     * @return string
     */
    public function customSize(): string
    {
        if (empty($this->conf('size'))) {
            return 'h3';
        }

        return (string) $this->conf('size');
    }

    /**
     * @return bool
     */
    protected function filterUnmentioned(): bool
    {
        return Arr::get($this->config, 'adv_filter') === 'unmentioned';
    }

    /**
     * @return bool
     */
    protected function filterMentionless(): bool
    {
        return Arr::get($this->config, 'adv_filter') === 'mentionless';
    }
}
