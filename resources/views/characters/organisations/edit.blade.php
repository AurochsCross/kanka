@extends('layouts.app', [
    'title' => trans('characters.organisations.edit.title', ['name' => $model->name]),
    'breadcrumbs' => [
        ['url' => route('characters.index'), 'label' => __('entities.characters')],
        ['url' => route('characters.show', $model->id), 'label' => $model->name]
    ]
])

@section('content')
    @include('partials.errors')
    @include('characters.organisations._edit')
@endsection

