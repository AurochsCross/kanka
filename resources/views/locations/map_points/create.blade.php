@extends((isset($ajax) && $ajax ? 'layouts.ajax' : 'layouts.app'), [
    'title' => __('locations.map_points.create.title', ['name' => $location->name]),
    'description' => '',
    'breadcrumbs' => [
        ['url' => Breadcrumb::index('locations'), 'label' => __('entities.locations')],
        ['url' => route('locations.show', [$location, '#map']), 'label' => $location->name]
    ]
])

@section('content')
    @include('partials.errors')

    {!! Form::open(['route' => ['locations.map_points.store', $location], 'method'=>'POST', 'data-shortcut' => "1", 'class' => 'map-point-form']) !!}
    @include('locations.map_points._form')

    <div class="form-group point-save " style="display: none">
        <button class="btn btn-success">{{ __('crud.save') }}</button>
        @includeWhen(!request()->ajax(), 'partials.or_cancel', ['cancel' => route('locations.map_points.index', [$location])])
    </div>

    {!! Form::close() !!}
@endsection
