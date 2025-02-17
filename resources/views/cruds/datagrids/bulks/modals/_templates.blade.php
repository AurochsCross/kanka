
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('crud.click_modal.close') }}"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="clickModalLabel">{{ __('crud.bulk_templates.bulk_title') }}</h4>
</div>
<div class="modal-body">
    <div class="form-group required">
        <label>{{ __('entities/attributes.fields.template') }}</label>
        {!! Form::select('template_id', $templates, null, ['placeholder' => trans('entities/attributes.placeholders.template'), 'class' => 'form-control']) !!}
    </div>


    <p class="help-block">
        {!! __('attributes/templates.pitch', [
    'boosted-campaign' => link_to_route('front.boosters', __('concept.boosted-campaign')),
    'marketplace' => link_to(config('marketplace.url') . '/attribute-templates', __('front.menu.marketplace'), ['target' => '_blank'])
    ]) !!}
    </p>
</div>

<div class="modal-footer">
    <a href="#" class="pull-left" data-dismiss="modal">{{ __('crud.cancel') }}</a>
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-th-list" aria-hidden="true"></i>
        {{ __('crud.actions.apply') }}
    </button>
</div>
<input type="hidden" name="datagrid-action" value="templates" />
