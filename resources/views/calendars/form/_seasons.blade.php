<p class="help-block">{{ __('calendars.hints.seasons') }}</p>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">{{ __('calendars.parameters.seasons.name') }}</div>
        <div class="col-md-3">{{ __('calendars.parameters.seasons.month') }}</div>
        <div class="col-md-3">{{ __('calendars.parameters.seasons.day') }}</div>
    </div>
</div>
<?php
$seasons = [];
$seasonNames = old('season_name');
$seasonMonths = old('season_month');
$seasonDays = old('season_day');
if (!empty($seasonNames)) {
    $cpt = 0;
    foreach ($seasonNames as $name) {
        if (!empty($name) || !empty($seasonMonths[$cpt])) {
            $seasons[] = [
                'name' => $name,
                'month' => $seasonMonths[$cpt],
                'day' => $seasonDays[$cpt]
            ];
        }
        $cpt++;
    }
} elseif (isset($model)) {
    $seasons = $model->seasons();
} elseif (isset($source)) {
    $seasons = $source->seasons();
}?>
<div class="calendar-seasons sortable-elements">
    @foreach ($seasons as $season)
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="fa-solid fa-arrows-alt-v"></span>
                        </span>
                        {!! Form::text('season_name[]', $season['name'], ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    {!! Form::number('season_month[]', $season['month'], ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        {!! Form::number('season_day[]', $season['day'], ['class' => 'form-control']) !!}
                        <span class="input-group-btn">
                            <span class="month-delete btn btn-danger" data-remove="4" title="{{ __('crud.remove') }}">
                                <i class="fa-solid fa-trash"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<a class="btn btn-default calendar-add-template" data-template="#template_season" data-target=".calendar-seasons" href="#" title="{{ __('calendars.actions.add_season') }}">
    <i class="fa-solid fa-plus"></i> {{ __('calendars.actions.add_season') }}
</a>

@section('modals')
    @parent
<div class="form-group" id="template_season" style="display: none">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-addon cursor">
                    <span class="fa-solid fa-arrows-alt-v"></span>
                </span>
                {!! Form::text('season_name[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.name')]) !!}
            </div>
        </div>
        <div class="col-md-3">
            {!! Form::number('season_month[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.month')]) !!}
        </div>
        <div class="col-md-3">
            <div class="input-group">
                {!! Form::number('season_day[]', null, ['class' => 'form-control', 'placeholder' => __('calendars.parameters.seasons.day')]) !!}
                <span class="input-group-btn">
                    <span class="month-delete btn btn-danger" data-remove="4" title="{{ __('crud.remove') }}">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
