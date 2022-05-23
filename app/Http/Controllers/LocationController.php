<?php

namespace App\Http\Controllers;

use App\Datagrids\Filters\LocationFilter;
use App\Datagrids\Sorters\LocationCharacterSorter;
use App\Datagrids\Sorters\LocationFamilySorter;
use App\Datagrids\Sorters\LocationLocationSorter;
use App\Facades\Datagrid;
use App\Http\Requests\StoreLocation;
use App\Models\Location;
use App\Services\LocationService;
use App\Traits\TreeControllerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends CrudController
{
    /**
     * Tree / Nested Mode
     */
    use TreeControllerTrait;
    protected $treeControllerParentKey = 'parent_location_id';

    /**
     * @var string
     */
    protected $view = 'locations';
    protected $route = 'locations';
    protected $module = 'locations';

    /** @var string Model */
    protected $model = \App\Models\Location::class;

    /** @var LocationService */
    protected $locationService;

    /** @var string Filter */
    protected $filter = LocationFilter::class;

    /**
     * LocationController constructor.
     */
    public function __construct(LocationService $locationService)
    {
        parent::__construct();

        $this->locationService = $locationService;
    }

    /**
     * @param Location $location
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function map(Location $location, Request $request)
    {
        // Policies will always fail if they can't resolve the user.
        if (Auth::check()) {
            $this->authorize('map', $location);
        } else {
            $this->authorizeForGuest(\App\Models\CampaignPermission::ACTION_READ, $location);
            // Extra check for private maps
            if ($location->is_map_private) {
                abort('403');
            }
        }

        return view('locations.map', compact('location'));
    }

    /**
     * @param Location $location
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function mapAdmin(Location $location, Request $request)
    {
        $this->authorize('update', $location);

        if ($request->isMethod('post')) {
            $this->locationService->managePoints($location, $request->only('map_point'));

            return redirect()->route('locations.show', [$location, '#map'])
                ->with('success', trans('locations.map.success'));
        }
        return view('locations.map.edit', compact('location'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocation $request)
    {
        return $this->crudStore($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return $this->crudShow($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Character  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return $this->crudEdit($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Character  $location
     * @return \Illuminate\Http\Response
     */
    public function update(StoreLocation $request, Location $location)
    {
        return $this->crudUpdate($request, $location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Character  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        return $this->crudDestroy($location);
    }

    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function events(Location $location)
    {
        return $this->menuView($location, 'events');
    }

    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function characters(Location $location)
    {
        $this->authCheck($location);

        $options = ['location' => $location];
        $filters = [];
        if (request()->has('location_id')) {
            $options['location_id'] = $location->id;
            $filters['location_id'] = $location->id;;
        }
        Datagrid::layout(\App\Renderers\Layouts\Location\Character::class)
            ->route('locations.characters', $options);

        $this->rows = $location
            ->allCharacters()
            ->sort(request()->only(['o', 'k']))
            ->filter($filters)
            ->with(['location', 'location.entity', 'families', 'families.entity', 'races', 'races.entity', 'entity', 'entity.tags', 'entity.image'])
            ->has('entity')
            ->paginate();

        // Ajax Datagrid
        if (request()->ajax()) {
            return $this->datagridAjax();
        }

        return $this
            ->menuView($location, 'characters');
    }


    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function items(Location $location)
    {
        return $this->menuView($location, 'items');
    }

    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function locations(Location $location)
    {
        $this->authCheck($location);

        $options = ['location' => $location];
        $filters = [];
        if (request()->has('parent_location_id')) {
            $options['parent_location_id'] = $location->id;
            $filters['parent_location_id'] = $options['parent_location_id'];
        }
        Datagrid::layout(\App\Renderers\Layouts\Location\Location::class)
            ->route('locations.locations', $options);

        $this->rows = $location
            ->descendants()
            ->sort(request()->only(['o', 'k']))
            ->filter($filters)
            ->with(['location', 'location.entity', 'entity', 'entity.tags', 'entity.image'])
            ->has('entity')
            ->paginate();

        // Ajax Datagrid
        if (request()->ajax()) {
            return $this->datagridAjax();
        }

        return $this
            ->menuView($location, 'locations');
    }


    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function organisations(Location $location)
    {
        return $this->menuView($location, 'organisations');
    }

    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function journals(Location $location)
    {
        return $this->menuView($location, 'journals');
    }

    /**
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function maps(Location $location)
    {
        return $this->menuView($location, 'maps');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function mapPoints(Location $location)
    {
        return $this->menuView($location, 'map-points', true);
    }
}
