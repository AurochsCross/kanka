@extends('layouts.' . ($ajax ? 'ajax' : 'app'), [
    'title' => trans('campaigns.invites.create.title', ['name' => $campaign->name]),
    'description' => '',
    'breadcrumbs' => [
        ['url' => route('campaign'), 'label' => __('campaigns.index.title')],
        ['url' => route('campaign_users.index'), 'label' => trans('campaigns.show.tabs.members')]
    ]
])

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('partials.errors')

            {!! Form::open(array('route' => ['campaign_invites.store'], 'method'=>'POST')) !!}
            @include('campaigns.invites._form')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
