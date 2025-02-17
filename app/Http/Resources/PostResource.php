<?php

namespace App\Http\Resources;

use App\Models\Post;

class PostResource extends EntityChild
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Post $model */
        $model = $this->resource;
        return $this->entity([
            'name' => $model->name,
            'visibility_id' => (int) $model->visibility_id,
            'entry' => $model->entry,
            'entry_parsed' => $model->entry(),
//            'is_pinned' => (bool) $this->is_pinned,
            'position' => $model->position,
            'settings' => $model->settings,
        ]);
    }
}
