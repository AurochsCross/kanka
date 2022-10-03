@extends('layouts.app', [
    'title' => __('families.tree.title', ['name' => $family->name]),
    'breadcrumbs' => false,
    'mainTitle' => false,
    'miscModel' => $family,
])

@inject('campaignService', 'App\Services\CampaignService')

@section('content')
    @include('partials.errors')

    <div class="entity-grid">
        @include('entities.components.header', [
            'model' => $family,
            'breadcrumb' => [
                ['url' => Breadcrumb::index('families'), 'label' => __('families.index.title')],
                null
            ]
        ])

        @include('families._menu', ['active' => 'tree', 'model' => $family])

        <div class="entity-main-block">
            @include('families.panels._tree')
        </div>
    </div>
@endsection
