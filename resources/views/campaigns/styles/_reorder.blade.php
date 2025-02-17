
{!! Form::open([
    'route' => ['campaign_styles.reorder-save'],
    'method' => 'POST',
]) !!}
<div class="box box-solid box-entity-story-reorder">
    <div class="box-header with-border">
        <h3 class="box-title">
            {{ __('campaigns/styles.reorder.title') }}
        </h3>
    </div>
    <div class="box-body">

        <div class="element-live-reorder sortable-elements">
            @foreach($reorderStyles as $style)
                <div class="element" data-id="{{ $style->id }}">
                    {!! Form::hidden('style[]', $style->id) !!}
                    <div class="dragger">
                        <span class="fa-solid fa-ellipsis-v"></span>
                    </div>
                    <div class="name">
                        {!! $style->name !!}
                    </div>
                    <div class="icons">
                        @if ($style->is_enabled) <i class="fa-solid fa-check-circle"></i>@endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="box-footer">
        <button class="btn btn-primary btn-block">
            {{ __('campaigns/styles.reorder.save') }}
        </button>
    </div>
</div>

{!! Form::close() !!}
