<div class="row">
    <div class="col-md-6">
        @include('cruds.fields.name', ['trans' => 'attribute_templates'])
        <div class="form-group">
            {!! Form::select2(
                'attribute_template_id',
                (isset($model) && $model->attributeTemplate ? $model->attributeTemplate : FormCopy::field('attributeTemplate')->select()),
                App\Models\AttributeTemplate::class,
                false,
                __('attribute_templates.fields.attribute_template'),
                null,
                __('attribute_templates.placeholders.attribute_template')
            ) !!}
            <p class="help-block">{{ __('attribute_templates.hints.parent_attribute_template') }}</p>
        </div>
        <div class="form-group">
            @include('components.form.entity_types', ['options' => [
                'model' => (isset($model) && $model->entityType ? $model->entityType : FormCopy::field('entityType')->related())
            ]])
            <p class="help-block">{{ __('attribute_templates.hints.entity_type') }}</p>
        </div>
    </div>
</div>
