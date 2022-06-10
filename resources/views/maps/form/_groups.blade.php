<?php
/**
 * @var \App\Models\MapGroup $group
 * @var \App\Models\Map $model
 * @var \App\Services\CampaignService $campaign
 */
?>
@if (!isset($model) || empty($model->image))
    <div class="alert alert-warning">
        <p>{{ __('maps.helpers.missing_image') }}</p>
    </div>
@else
    <?php $groups = $model->groups()->ordered()->paginate(); ?>
    <p class="help-block">
        {{ __('maps/groups.helper.amount_v2') }}
    </p>

    <table class="table table-condensed">
    <thead>
    <tr>
        <th>{{ __('crud.fields.name') }}</th>
        <th>{{ __('maps/groups.fields.position') }}</th>
        <th>{{ __('maps/groups.fields.is_shown') }}</th>
        <th>{{ __('crud.fields.visibility') }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach ($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->position }}</td>
            <td>@if($group->is_shown) <i class="fa-solid fa-check"></i> @endif</td>
            <td>
                {!! $group->visibilityIcon() !!}
            </td>
            <td class="text-right">
                <a href="{{ route('maps.map_groups.edit', [$model, $group]) }}" class="btn btn-primary btn-xs"
                   title="{{ __('crud.edit') }}"
                   data-toggle="ajax-modal" data-target="#entity-modal"
                   data-url="{{ route('maps.map_groups.edit', [$model, $group]) }}"
                >
                    <i class="fa-solid fa-pencil"></i>
                </a>

                <a href="#" class="btn btn-xs btn-danger delete-confirm" data-toggle="modal" data-name="{{ $group->name }}"
                        data-target="#delete-confirm" data-delete-target="delete-form-group-{{ $group->id }}"
                        title="{{ __('crud.remove') }}">
                    <i class="fa-solid fa-trash" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
    @endforeach

    </tbody>
    </table>

    <div class="pull-right">
        {{ $groups->links() }}
    </div>

    <a href="{{ route('maps.map_groups.create', ['map' => $model]) }}" class="btn btn-primary"
       data-toggle="ajax-modal" data-target="#entity-modal"
       data-url="{{ route('maps.map_groups.create', ['map' => $model]) }}"
    >
        <i class="fa-solid fa-plus"></i> {{ __('maps/groups.actions.add') }}
    </a>

@endif

@if (!empty($groups))
@section('modals')
    @parent
    @foreach ($groups as $group)
        {!! Form::open(['method' => 'DELETE', 'route' => ['maps.map_groups.destroy', $model, $group], 'style '=> 'display:inline', 'id' => 'delete-form-group-' . $group->id]) !!}
        {!! Form::close() !!}
    @endforeach
@endsection
@endif
