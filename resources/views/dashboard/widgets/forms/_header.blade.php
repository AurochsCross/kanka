@php $boosted = $campaignService->campaign()->boosted() @endphp

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#setup">
                {{ __('dashboard.widgets.tabs.setup') }}
            </a>
        </li>
        <li>
            <a class="" data-toggle="tab" href="#advanced">
                {{ __('dashboard.widgets.tabs.advanced') }}
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="setup" class="tab-pane fade in active">

            @include('dashboard.widgets.forms._name')
            <div class="row">
                <div class="col-sm-6">
                    @include('dashboard.widgets.forms._width')
                </div>
                <div class="col-sm-6">
                    @include('dashboard.widgets.forms._size')
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::select2('entity_id', !empty($model) && $model->entity ? $model->entity : null, App\Models\Entity::class, false, 'dashboard.widgets.fields.optional-entity', 'search.entities-with-relations') !!}
                    </div>
                </div>
            </div>
        </div>
        <div id="advanced" class="tab-pane fade in">
            @includeWhen(!$boosted, 'dashboard.widgets.forms._boosted')

            <div class="grid grid-cols-2 gap-2">
                @include('dashboard.widgets.forms._class')
            </div>
        </div>
    </div>
</div>


