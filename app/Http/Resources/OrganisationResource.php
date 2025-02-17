<?php

namespace App\Http\Resources;

use App\Models\Organisation;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationResource extends EntityResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Organisation $model */
        $model = $this->resource;
        return $this->entity([
            'type' => $model->type,
            'organisation_id' => $model->organisation_id,
            'is_defunct' => (bool) $model->is_defunct,
            'members' => OrganisationMemberResource::collection($model->members()->has('character')->with('character')->get())
        ]);
    }
}
