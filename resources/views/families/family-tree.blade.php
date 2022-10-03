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

@section('styles')
    <style>
        .family-tree {
            display: flex;
            align-items: flex-start;
            flex-wrap: nowrap;
        }
        .branch {
            border: 1px solid #555;
            border-radius: 5px;
            padding: 15px;
            margin: 5px;
            display: flex;
            align-items: center;
            flex-direction: column;
        }
        .entity {
            border: 1px solid #555;
            border-radius: 5px;
            padding: 15px;
            margin: 5px;

            display: flex;
            align-items: center;
            flex-direction: row;
            flex-basis: 100%;
        }
        .children {
            border: 1px dotted black;
            flex-direction: row;
        }
    </style>
@endsection
