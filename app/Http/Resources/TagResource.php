<?php

namespace App\Http\Resources;

use App\Models\Tag;
use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends EntityResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Tag $model */
        $model = $this->resource;
        return $this->entity([
            'type' => $model->type,
            'tag_id' => $model->tag_id,
            'colour' => $model->colour,
            'entities' => $model->entities()->distinct()->pluck('entities.id')->toArray(),
            'is_auto_applied' => (bool) $model->is_auto_applied,
        ]);
    }
}
