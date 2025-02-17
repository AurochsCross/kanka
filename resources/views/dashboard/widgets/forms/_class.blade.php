<div class="form-group">
    <label for="config[class]">
        {{ __('dashboard.widgets.fields.class') }}
        <i class="fa-solid fa-question-circle hidden-xs hidden-sm" data-toggle="tooltip" title="{{ __('dashboard.widgets.helpers.class') }}"></i>
    </label>
    {!! Form::text('config[class]', null, ['class' => 'form-control', 'id' => 'config[class]', 'disabled' => !$boosted ? 'disabled' : null]) !!}
    <p class="help-block visible-xs visible-sm">
        {{ __('dashboard.widgets.helpers.class') }}
    </p>
</div>
