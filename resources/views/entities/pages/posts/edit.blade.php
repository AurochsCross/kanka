@extends('layouts.' . (request()->ajax() ? 'ajax' : 'app'), [
    'title' => __('entities/notes.edit.title', ['name' => $entity->name]),
    'description' => '',
    'breadcrumbs' => [
        ['url' => route($parentRoute . '.index'), 'label' => __('entities.' . $parentRoute)],
        ['url' => route($parentRoute . '.show', $entity->child->id), 'label' => $entity->name],
        __('crud.update'),
    ]
])
@inject('campaignService', 'App\Services\CampaignService')

@section('fullpage-form')
    {!! Form::model($model, ['method' => 'PATCH', 'route' => ['entities.posts.update', $entity->id, $model->id], 'data-shortcut' => '1', 'class' => 'entity-note-form post-form entity-form', 'id' => 'entity-form']) !!}
@endsection

@section('content')

    @include('entities.pages.posts._form')

    <div class="mt-5 text-right">
        <a role="button" tabindex="0" class="btn btn-danger btn-dynamic-delete" data-toggle="popover"
           title="{{ __('crud.delete_modal.title') }}"
           data-content="<p>{{ __('crud.delete_modal.permanent') }}</p>
                       <a href='#' class='btn btn-danger btn-block' data-toggle='delete-form' data-target='#delete-form-note-{{ $model->id}}'>{{ __('crud.remove') }}</a>">
            <i class="fa-solid fa-trash" aria-hidden="true"></i> {{ __('crud.remove') }}
        </a>
    </div>

    @if(!empty($model) && $campaignService->campaign()->hasEditingWarning())
        <input type="hidden" id="editing-keep-alive" data-url="{{ route('posts.keep-alive', ['post' => $model, 'entity' => $entity]) }}" />
    @endif
@endsection

@include('editors.editor')

@section('fullpage-form-end')
    @if(!empty($from))
        <input type="hidden" name="from" value="main" />
    @endif
    {!! Form::close() !!}
@endsection

@section('modals')
    @parent
    {!! Form::open(['method' => 'DELETE', 'route' => ['entities.posts.destroy', 'entity' => $entity, 'post' => $model], 'style' => 'display:inline', 'id' => 'delete-form-note-' . $model->id]) !!}
    {!! Form::close() !!}

    @includeWhen(!empty($editingUsers) && !empty($model), 'cruds.forms.edit_warning', ['model' => $model, 'entity' => $entity])

@endsection
