@extends('layouts.app', [
    'title' => trans('characters.quests.title', ['name' => $model->name]),
    'description' => trans('characters.quests.description'),
    'breadcrumbs' => [
        ['url' => route('characters.index'), 'label' => __('entities.characters')],
        ['url' => route('characters.show', $model), 'label' => $model->name],
        trans('entities.quests')
    ],
    'mainTitle' => false,
    'miscModel' => $model,
])

@inject('campaignService', 'App\Services\CampaignService')

@include('entities.components.header', ['model' => $model])

@section('content')
    @include('partials.errors')
    <div class="row entity-grid">
        <div class="col-md-2 entity-sidebar-submenu">
            @include('characters._menu', ['active' => 'quests'])
        </div>
        <div class="col-md-10 entity-main-block">
            @include('characters.panels.quests')
        </div>
    </div>
@endsection
