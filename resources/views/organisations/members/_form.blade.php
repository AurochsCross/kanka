@php
$options = [
    '' => __('organisations.members.pinned.none'),
    \App\Models\OrganisationMember::PIN_CHARACTER => __('organisations.members.pinned.character'),
    \App\Models\OrganisationMember::PIN_ORGANISATION => __('organisations.members.pinned.organisation'),
    \App\Models\OrganisationMember::PIN_BOTH => __('organisations.members.pinned.both'),
];
$statuses = [
    \App\Models\OrganisationMember::STATUS_ACTIVE => __('organisations.members.status.active'),
    \App\Models\OrganisationMember::STATUS_INACTIVE => __('organisations.members.status.inactive'),
    \App\Models\OrganisationMember::STATUS_UNKNOWN => __('organisations.members.status.unknown'),
];
@endphp

{{ csrf_field() }}
<div class="form-group required">
    {!! Form::select2(
        'character_id',
        (!empty($member) && $member->character ? $member->character : null),
        App\Models\Character::class
    ) !!}
</div>
<div class="form-group">
    <input type="hidden" name="parent_id" value="" />
    {!! Form::select2(
        'parent_id',
        (!empty($member) ? $member->parent : null),
        App\Models\OrganisationMember::class,
        false,
        'organisations.members.fields.parent',
        'search.organisation-member',
        'organisations.members.placeholders.parent',
        $model,
    ) !!}
</div>

<div class="form-group">
    <label>{{ __('organisations.members.fields.role') }}</label>
    {!! Form::text('role', null, ['placeholder' => __('organisations.members.placeholders.role'), 'class' => 'form-control', 'maxlength' => 45]) !!}
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>
                {{ __('organisations.members.fields.status') }}
            </label>
            {!! Form::select('status_id', $statuses, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>
                {{ __('organisations.members.fields.pinned') }}
                <i class="fa-solid fa-question-circle hidden-xs hidden-sm" data-toggle="tooltip" title="{{ __('organisations.members.helpers.pinned') }}"></i>
            </label>
            {!! Form::select('pin_id', $options, null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>


@includeWhen(auth()->user()->isAdmin(), 'cruds.fields.privacy_callout', ['model' => !empty($member) ? $member : null])


