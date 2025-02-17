<?php
/**
* @var \App\Models\Map $map
* @var \App\Models\MapGroup $model
*/
?>
@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => __('maps/groups.edit.title', ['name' => $model->name]),
    'breadcrumbs' => [
        ['url' => route('maps.index'), 'label' => __('entities.maps')],
        ['url' => $map->entity->url('show'), 'label' => $map->name],
        ['url' => route('maps.map_groups.index', [$map]), 'label' => __('maps.panels.groups')],
        __('maps/groups.edit.title', ['name' => $model->name])
    ]
])

@section('content')
    {!! Form::model($model, ['route' => ['maps.map_groups.update', 'map' => $map, 'map_group' => $model], 'method' => 'PATCH', 'id' => 'map-group-form', 'enctype' => 'multipart/form-data', 'class' => 'ajax-subform']) !!}

    @include('partials.forms.form', [
        'title' => __('maps/groups.edit.title', ['name' => $map->name]),
        'content' => 'maps.groups._form',
        'actions' => 'maps.groups._actions'
    ])

    {!! Form::close() !!}
@endsection
