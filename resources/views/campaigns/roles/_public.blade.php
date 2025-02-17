<?php
/**
 * @var \App\Services\PermissionService $permission
 * @var \App\Services\EntityService $entity
 * @var \App\Models\CampaignRole $role
 */
$permission->role($role);
?>
<h1 class="mb-2 mt-0">
    <div class="pull-right">
        <a href="#" data-url="{{ route('campaign-visibility') }}" data-target="#entity-modal" data-toggle="ajax-modal" class="btn btn-primary" >
            <i class="fa-solid fa-user-secret"></i> {{ __('campaigns/roles.actions.status', ['status' => $campaign->isPublic() ? __('campaigns.visibilities.public') : __('campaigns.visibilities.private')]) }}
        </a>

        <button class="btn btn-default" data-toggle="dialog"
                data-target="public-help">
            <i class="fa-solid fa-question-circle" aria-hidden="true"></i>
            {!! __('campaigns.members.actions.help') !!}
        </button>
    </div>
    {{ __('crud.permissions.title') }}
</h1>

<div class="grid gap-2 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
    @foreach ($permission->entityTypes() as $name => $id)
        <div class="public-permission cursor px-2 py-5 {{ $permission->type($id)->can() ? "enabled": null }}" data-url="{{ route('campaign_roles.toggle', [$role, 'entity' => $id, 'action' => \App\Models\CampaignPermission::ACTION_READ]) }}">
            <i class="{{ EntitySetup::icon($id) }} mb-2" aria-hidden="true"></i>
            {{ EntitySetup::plural($id) }}
        </div>
    @endforeach
</div>

@section('modals')
    @parent

    @include('partials.helper-modal', [
    'id' => 'public-help',
    'title' => __('campaigns.roles.modals.details.title'),
    'textes' => [
        __('campaigns/roles.public.description', ['name' => $role->name]),
        __('campaigns/roles.public.test', ['url' => link_to_route('dashboard')]),
        '<a href="https://www.youtube.com/watch?v=VpY_D2PAguM" target="_blank"><i class="fa-solid fa-external-link-alt"></i> ' . __('helpers.public') . '</a>'
]
])
@endsection
