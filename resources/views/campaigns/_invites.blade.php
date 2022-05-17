<?php
/**
 * @var \App\Models\CampaignUser[] $users
 * @var \App\Models\CampaignRole[] $roles
 * @var \App\Models\CampaignInvite[] $invitations
 */
?>
@if (auth()->user()->can('invite', $campaign))
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ __('campaigns.members.invite.title') }}
            </h3>
            <div class="box-tools">
                <button class="btn btn-default btn-sm" data-toggle="modal"
                        data-target="#invite-help">
                    <i class="fa-solid fa-question-circle" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-md">{{ __('campaigns.members.actions.help') }}</span>
                </button>

                <a href="{{ route('campaign_invites.create') }}" class="btn btn-primary btn-sm"
                   data-toggle="ajax-modal" data-target="#small-modal" data-url="{{ route('campaign_invites.create', ['type' => 'link']) }}">
                    <i class="fa-solid fa-user-plus" aria-hidden="true"></i>
                    <span class="hidden-xs hidden-md">{{ __('campaigns.invites.actions.link') }}</span>
                </a>
            </div>
        </div>
        @if($invitations->count() > 0)
            <div class="box-body no-padding">
                <div class="table-responsive">
                    <table id="campaign-invites" class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('campaigns.invites.fields.type') }}</th>
                            <th class="hidden-xs hidden-sm">{{ __('campaigns.invites.fields.usage') }}</th>
                            <th>{{ __('campaigns.invites.fields.role') }}</th>
                            <th class="hidden-xs hidden-md">{{ __('campaigns.invites.fields.created') }}</th>
                            <th class="text-right">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($invitations as $relation)
                            <tr>
                                <td>
                                    @if($relation->isEmail())<span class="hidden-sm hidden-xs">{{ $relation->email }}</span>
                                    @else
                                        <a href="{{ route('campaigns.join', ['token' => $relation->token]) }}">
                                            {{ substr($relation->token, 0, 6) . '...' }}
                                        </a>
                                        <a href="#" title="{{ __('campaigns.invites.actions.copy') }}" data-clipboard="{{ route('campaigns.join', ['token' => $relation->token]) }}" data-toggle="tooltip">
                                            <i class="fa-solid fa-copy"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="hidden-xs hidden-sm">
                                    {{ $relation->validity !== null ? $relation->validity : __('campaigns.invites.unlimited_validity') }}
                                </td>
                                <td>{{ $relation->role ? $relation->role->name : null }}</td>
                                <td class="hidden-xs hidden-md">
                                <span title="{{ $relation->created_at }}+00:00" data-toggle="tooltip">
                                    {{ $relation->created_at->diffForHumans() }}
                                </span>
                                </td>

                                <td class="text-right">
                                    {!! Form::open(['method' => 'DELETE','route' => ['campaign_invites.destroy', $relation->id],'style'=>'display:inline']) !!}
                                    <button class="btn btn-xs btn-danger">
                                        <i class="fa-solid fa-trash" aria-hidden="true"></i> <span  class="hidden-xs hidden-md">{{ __('crud.remove') }}</span>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </thead>
                    </table>
                </div>
            </div>
            @if($invitations->hasPages())
                <div class="box-footer text-right">
                    {{ $invitations->links() }}
                </div>
            @endif
        @else
            <div class="box-body">
                <p class="help-block">
                    {!! __('campaigns.members.invite.description') !!}
                </p>
            </div>
        @endif
    </div>
@endif


@section('modals')
    @parent
    @include('partials.helper-modal', [
        'id' => 'invite-help',
        'title' => __('campaigns.members.invite.title'),
        'textes' => [
            __('campaigns.members.invite.description'),
            __('campaigns.members.invite.more', [
                        'link' =>
                            '<a href="' . route('campaign_roles.index') . '">'
                            . __('campaigns.members.invite.roles_page') . '</a>'
                    ])
        ]
    ])

    <div class="modal fade" id="small-modal" role="dialog" aria-labelledby="deleteConfirmLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content rounded-2xl" id="small-modal-content"></div>
        </div>
    </div>
@endsection
