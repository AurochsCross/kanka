<?php

namespace App\Http\Controllers\Timelines;

use App\Datagrids\Filters\TimelineFilter;
use App\Datagrids\Sorters\TimelineTimelineSorter;
use App\Facades\Datagrid;
use App\Http\Controllers\CrudController;
use App\Http\Requests\StoreTimeline;
use App\Models\Timeline;
use App\Traits\TreeControllerTrait;

class TimelineController extends CrudController
{
    use TreeControllerTrait;

    /**
     * @var string
     */
    protected string $view = 'timelines';
    protected string $route = 'timelines';

    /** @var string */
    protected $model = \App\Models\Timeline::class;

    /** @var string */
    protected $filter = TimelineFilter::class;

    protected $module = 'timelines';

    /**
     */
    public function store(StoreTimeline $request)
    {
        return $this->crudStore($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Timeline $timeline)
    {
        return $this->crudShow($timeline);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timeline $timeline)
    {
        return $this->crudEdit($timeline);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTimeline $request, Timeline $timeline)
    {
        return $this->crudUpdate($request, $timeline);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timeline $timeline)
    {
        return $this->crudDestroy($timeline);
    }

    /**
     * @param Timeline $timeline
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function timelines(Timeline $timeline)
    {
        $this->authCheck($timeline);

        $options = ['timeline' => $timeline];
        $filters = [];
        if (request()->has('parent_id')) {
            $options['parent_id'] = $timeline->id;
            $filters['timeline_id'] = $timeline->id;
        }

        Datagrid::layout(\App\Renderers\Layouts\Timeline\Timeline::class)
            ->route('timelines.timelines', $options);

        // @phpstan-ignore-next-line
        $this->rows = $timeline
            ->descendants()
            ->sort(request()->only(['o', 'k']))
            ->with(['entity', 'timeline', 'timeline.entity'])
            ->filter($filters)
            ->paginate();

        if (request()->ajax()) {
            return $this->datagridAjax();
        }

        return $this
            ->menuView($timeline, 'timelines');
    }
}
