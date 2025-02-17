<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Campaign;
use App\Models\Tag;
use App\Http\Requests\StoreTag as Request;
use App\Http\Resources\TagResource as Resource;

class TagApiController extends ApiController
{
    /**
     * @param Campaign $campaign
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        return Resource::collection($campaign
            ->tags()
            ->filter(request()->all())
            ->withApi()
            ->lastSync(request()->get('lastSync'))
            ->paginate());
    }

    /**
     * @param Campaign $campaign
     * @param Tag $tag
     * @return Resource
     */
    public function show(Campaign $campaign, Tag $tag)
    {
        $this->authorize('access', $campaign);
        $this->authorize('view', $tag);
        return new Resource($tag);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @return Resource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, Campaign $campaign)
    {
        $this->authorize('access', $campaign);
        $this->authorize('create', Tag::class);
        $model = Tag::create($request->all());
        $this->crudSave($model);
        return new Resource($model);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Tag $tag
     * @return Resource
     */
    public function update(Request $request, Campaign $campaign, Tag $tag)
    {
        $this->authorize('access', $campaign);
        $this->authorize('update', $tag);
        $tag->update($request->all());
        $this->crudSave($tag);

        return new Resource($tag);
    }

    /**
     * @param Request $request
     * @param Campaign $campaign
     * @param Tag $tag
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(\Illuminate\Http\Request $request, Campaign $campaign, Tag $tag)
    {
        $this->authorize('access', $campaign);
        $this->authorize('delete', $tag);
        $tag->delete();

        return response()->json(null, 204);
    }
}
