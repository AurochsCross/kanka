<?php
/**
 * @var \App\Models\EntityNotePermission $perm
 */
$permissions = [
    0 => __('crud.view'),
    1 => __('crud.edit'),
    2 => __('crud.permissions.actions.bulk.deny')
];
$currentCampaign = \App\Facades\CampaignLocalization::getCampaign();
$defaultCollapsed = null;
if (!isset($model) && !empty($currentCampaign->ui_settings['post_collapsed'])) {
    $defaultCollapsed = 1;
}
?>
<div class="nav-tabs-custom">
    <div class="pull-right">
        @include('entities.pages.posts._save-options')
    </div>
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#form-entry" title="{{ __('crud.fields.entry') }}">
                {{ __('crud.fields.entry') }}
            </a>
        </li>
       @can('permission', $entity->child)
        <li class="">
            <a href="#form-permissions" title="{{ __('entities/notes.show.advanced') }}">
                {{ __('entities/notes.show.advanced') }}
            </a>
        </li>
       @endcan
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="form-entry">
            <div class="form-group required">
                {!! Form::text('name', null, ['placeholder' => __('entities/notes.placeholders.name'), 'class' => 'form-control', 'maxlength' => 191, 'data-live-disabled' => '1', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::textarea('entryForEdition', null, ['class' => 'form-control html-editor', 'id' => 'entry', 'name' => 'entry']) !!}
                <div class="text-right">
                    <a href="//docs.kanka.io/en/latest/features/mentions.html" target="_blank" title="{{ __('helpers.link.description') }}">
                        {{ __('crud.helpers.linking') }} <i class="fa-solid fa-question-circle"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="location_id" value="" />
                    @include('cruds.fields.location', ['from' => null])
                </div>
                <div class="col-md-6">
                    @include('cruds.fields.visibility_id')
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::hidden('settings[collapsed]', 0) !!}
                        <label>
                            {!! Form::checkbox('settings[collapsed]', 1, $defaultCollapsed) !!}
                            {{ __('entities/notes.fields.collapsed') }}
                            <i class="fa-solid fa-question-circle" data-toggle="tooltip" data-html="true" title="{!! __('entities/notes.hints.reorder', ['icon' => '<i class=\'fa-solid fa-cog\'></i>']) !!}"></i>
                        </label>
                        <div class="help-block visible-xs visible-sm">
                            {!! __('entities/notes.hints.reorder', ['icon' => '<i class="fa-solid fa-cog"></i>']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @includeWhen(auth()->user()->can('permission', $entity->child), 'entities.pages.posts._permissions')
    </div>
</div>


{!! Form::hidden('entity_id', $entity->id) !!}
