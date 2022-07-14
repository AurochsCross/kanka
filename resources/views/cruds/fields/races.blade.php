@if (!$campaignService->enabled('races'))
    <?php return ?>
@endif

@php
$preset = null;
if (isset($model) && $model->race) {
    $preset = $model->race;
} elseif (isset($parent) && $parent) {
    $preset = FormCopy::field('race')->select(true, \App\Models\Race::class);
} else {
    $preset = FormCopy::field('race')->select();
}
if (!isset($source)) {
    $source = null;
}

$data = [
    'preset' => $preset,
    'class' => App\Models\Race::class,
];
if (isset($enableNew)) {
    $data['allowNew'] = $enableNew;
}
if (isset($parent) && $parent) {
    $data['labelKey'] = 'races.fields.race';
}
if (isset($dropdownParent)) {
    $data['dropdownParent'] = $dropdownParent;
}
if (isset($from)) {
    $data['from'] = $from;
}
@endphp
<input type="hidden" name="save_races" value="1">
<div class="form-group">
    @include('components.form.races', ['options' => [
        'model' => $model ?? FormCopy::model(),
        'source' => $source ?? null
    ]])
</div>
