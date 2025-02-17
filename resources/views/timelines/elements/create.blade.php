<?php
/**
* @var \App\Models\Timeline $timeline
* @var \App\Models\TimelineElement $model
*/
?>
@extends('layouts.' . ($ajax ? 'ajax' : 'app'), [
'title' => __('timelines/elements.create.title', ['name' => $timeline->name]),
'description' => '',
'breadcrumbs' => [
['url' => route('timelines.index'), 'label' => __('entities.timelines')],
['url' => $timeline->entity->url('show'), 'label' => $timeline->name],
__('timelines/elements.create.title')
]
])

@section('content')
    @include('partials.errors')
    {!! Form::open(['route' => ['timelines.timeline_elements.store', $timeline], 'method' => 'POST', 'id' => 'timeline-element-form', 'enctype' => 'multipart/form-data', 'class' => 'ajax-subform', 'data-shortcut' => 1]) !!}
    <div class="panel panel-default">
        @if ($ajax)
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="{{ trans('crud.delete_modal.close') }}"><span aria-hidden="true">&times;</span></button>
                <h4>
                    {{ __('timelines/elements.create.title', ['name' => $timeline->name]) }}
                </h4>
            </div>
        @endif
        <div class="panel-body">
            @include('timelines.elements._form', ['model' => null])
        </div>
        <div class="panel-footer">
            <a href="{{ route('timelines.show', $timeline) }}" class="btn btn-default">
                {{ __('crud.cancel') }}
            </a>
            <div class="form-element pull-right">
                <div class="submit-group">
                    <button class="btn btn-success">{{ trans('crud.save') }}</button>
                </div>
                <div class="submit-animation" style="display: none;">
                    <button class="btn btn-success" disabled><i class="fa-solid fa-spinner fa-spin"></i></button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
