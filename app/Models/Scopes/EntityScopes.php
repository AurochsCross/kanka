<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Trait EntityScopes
 * @package App\Models\Scopes
 *
 * @method static self|Builder recentlyModified()
 * @method static self|Builder unmentioned()
 * @method static self|Builder mentionless()
 * @method static self|Builder type(string $type)
 * @method static self|Builder inTags(array $tags)
 * @method static self|Builder inTypes(array $types)
 * @method static self|Builder templates(string $entityType)
 * @method static self|Builder apiFilter(array $requests)
 */
trait EntityScopes
{
    /**
     * @param Builder$query
     * @return Builder
     */
    public function scopeRecentlyModified(Builder $query): Builder
    {
        return $query
            ->orderBy($this->getTable() . '.updated_at', 'desc');
    }

    /**
     * @param Builder $query
     * @param int|null $type
     * @return Builder
     */
    public function scopeType(Builder $query, int $type = null): Builder
    {
        if (empty($type)) {
            return $query;
        }
        return $query->where('type_id', $type);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeStandardWith(Builder $query): Builder
    {
        return $query->with('tags');
    }

    /**
     * @param Builder $query
     * @param array|null $tags
     * @return mixed
     */
    public function scopeInTags(Builder $query, array $tags = null)
    {
        if (empty($tags)) {
            return $query;
        }

        $query->distinct()
            ->select($this->getTable() . '.*');

        foreach ($tags as $tag) {
            $v = (int) $tag;
            $query
                ->leftJoin('entity_tags as et' . $v, "et$v.entity_id", $this->getTable() . '.id')
                ->where("et$v.tag_id", $v)
            ;
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeUnmentioned(Builder $query)
    {
        return $query->select($this->getTable() . '.*')
            ->leftJoin('entity_mentions as em', 'em.target_id', $this->getTable() . '.id')
            ->whereNull('em.id');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeMentionless(Builder $query)
    {
        return $query->select($this->getTable() . '.*')
            ->leftJoin('entity_mentions as em', 'em.entity_id', $this->getTable() . '.id')
            ->whereNull('em.id');
    }

    /**
     * @param Builder $query
     * @param int $entityTypeID
     * @return Builder
     */
    public function scopeTemplates(Builder $query, int $entityTypeID)
    {
        return $query
            ->where('type_id', $entityTypeID)
            ->where('is_template', 1);
    }

    /**
     * @param Builder $query
     * @param array $request
     * @return Builder
     */
    public function scopeApiFilter(Builder $query, array $request = [])
    {
        $related = Arr::get($request, 'related', false);
        $types = Arr::get($request, 'types');
        if (!empty($types)) {
            $typeNames = explode(',', $types);
            $typeIds = [];
            foreach ($typeNames as $type) {
                $id = config('entities.ids.' . $type);
                if (empty($id)) {
                    continue;
                }
                $typeIds[] = $id;
            }
            $query->whereIn('type_id', $typeIds);
        }

        // Other available:
        $filterableFields = [
            'name',
            'is_private',
            'is_template',
            'created_by',
            'updated_by',
            'tags',
        ];
        foreach ($request as $field => $value) {
            if (!in_array($field, $filterableFields)) {
                continue;
            }
            if (Str::startsWith($field, ['is_'])) {
                $bool = in_array($value, ['true', 1]) ? true : false;
                $query->where($field, $bool);
            } elseif (Str::endsWith($field, '_by')) {
                $query->where($field, (int) $value);
            } elseif ($field === 'tags') {
                // Something something tags
                if (!is_array($value)) {
                    $value = [$value];
                }
                $query
                    ->whereHas('tags', function ($query) use ($value) {
                        return $query->whereIn('tags.id', $value);
                    });

            } else {
                $query->where($field, 'LIKE', '%' . $value . '%');
            }
        }

        return $query
            ->with($related ? [
                'attributes', 'notes', 'events',
                'relationships', 'inventories', 'abilities',
                'tags', 'image', 'assets',
            ] : ['tags', 'image'])
        ;
    }

    /**
     * @param Builder $query
     * @param array|null $types
     * @return Builder
     */
    public function scopeInTypes(Builder $query, array $types = null)
    {
        if (empty($types) || !is_array($types)) {
            return $query;
        }

        if ($types[0] == 'all') {
            return $query;
        }

        return $query->whereIn($this->getTable() . '.type_id', $types);
    }
}
