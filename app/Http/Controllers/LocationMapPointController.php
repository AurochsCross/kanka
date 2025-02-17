<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoveLocationMapPoint;
use App\Http\Requests\StoreLocation;
use App\Http\Requests\StoreMapPoint;
use App\Models\Location;
use App\Models\MapPoint;
use App\Services\LocationService;
use App\Traits\GuestAuthTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Exception\LogicException;

class LocationMapPointController extends Controller
{
    use GuestAuthTrait;

    /**
     * @var string
     */
    protected string $view = 'locations.map_points';
    protected string $route = 'locations.map_points';

    /**
     * @var string
     */
    protected $model = \App\Models\MapPoint::class;

    /**
     */
    public function index(Request $request, Location $location)
    {
        $this->authorize('update', $location);
        return view('locations.map.edit', compact('location'));
    }

    /**
     */
    public function create(Location $location)
    {
        $this->authorize('update', $location);

        $ajax = request()->ajax();
        return view('locations.map_points.create', compact('location', 'ajax'));
    }

    /**
     */
    public function show(Location $location, MapPoint $mapPoint)
    {
        // Policies will always fail if they can't resolve the user.
        if (Auth::check()) {
            $this->authorize('view', $location);
        } else {
            $this->model = Location::class;
            $this->authorizeForGuest(\App\Models\CampaignPermission::ACTION_READ, $location);
        }

        $ajax = request()->ajax();
        return view('locations.map_points.' . ($ajax ? '_' : null) . 'show', compact('location', 'mapPoint', 'ajax'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMapPoint $request, Location $location)
    {
        $this->authorize('update', $location);

        try {
            $model = new MapPoint();
            $mapPoint = $model->create($request->all());

            if ($request->ajax()) {
                return response()->json([
                    'point' => view('locations.map_points._point', ['point' => $mapPoint])->render(),
                    'id' => 'map-point-' . $mapPoint->id
                ]);
            }

            return redirect()->route('locations.map', $location)
                ->with('success', trans('locations.map.points.success.create'));
        } catch (LogicException $exception) {
            $error =  str_replace(' ', '_', strtolower($exception->getMessage()));
            return redirect()->back()->withInput()->with('error', trans('crud.errors.' . $error));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location, MapPoint $mapPoint)
    {
        $this->authorize('update', $location);
        $model = $mapPoint;
        $ajax = request()->ajax();

        return view('locations.map_points.edit', compact('location', 'model', 'ajax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMapPoint $request, Location $location, MapPoint $mapPoint)
    {
        $this->authorize('update', $location);

        try {
            $data = $this->prepareData($request, $mapPoint);
            $mapPoint->update($data);

            if ($request->ajax()) {
                return response()->json([
                    'point' => view('locations.map_points._point', ['point' => $mapPoint])->render(),
                    'id' => 'map-point-' . $mapPoint->id
                ]);
            }

            return redirect()->route('locations.map', $location)
                ->with('success', trans('locations.map.points.success.update'));
        } catch (LogicException $exception) {
            $error =  str_replace(' ', '_', strtolower($exception->getMessage()));
            return redirect()->back()->withInput()->with('error', trans('crud.errors.' . $error));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function move(MoveLocationMapPoint $request, Location $location, MapPoint $mapPoint)
    {
        $this->authorize('update', $location);


        $mapPoint->axis_x = $request->post('axis_x', '1');
        $mapPoint->axis_y = $request->post('axis_y', '1');
        $mapPoint->save();

        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, MapPoint $mapPoint)
    {
        $this->authorize('update', $location);

        $mapPoint->delete();

        if (request()->ajax()) {
            return response()->json([
                'id' => 'map-point-' . $mapPoint->id
            ]);
        }

        return redirect()->route($this->route . '.show', [$location, '#map'])
            ->with('success', trans($this->view . '.destroy.success', ['name' => $mapPoint->location->name]));
    }

    /**
     * @param Request $request
     * @param MapPoint $model
     * @return array
     */
    protected function prepareData(Request $request, MapPoint $model)
    {
        $data = $request->all();
        foreach ($model->nullableForeignKeys as $field) {
            if (!request()->has($field) && !isset($data[$field])) {
                $data[$field] = null;
            }
        }
        return $data;
    }
}
