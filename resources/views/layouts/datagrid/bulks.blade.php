<?php /** @var \App\Renderers\DatagridRenderer2 $datagrid */
use App\Facades\Datagrid;
$hasOthers = false;
?>
<div class="dropdown datagrid-bulk-actions">
    <a class="dropdown-toggle btn btn-default disabled" data-toggle="dropdown" aria-expanded="false" data-tree="escape">
        {{ __('crud.bulk.buttons.label') }}
        <i class="fa-solid fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-right" role="menu">

        @foreach (\App\Facades\Datagrid::bulks() as $bulk)
            @if ($bulk === \App\Renderers\Layouts\Layout::ACTION_EDIT)
                <li>
                    <a href="#" class="datagrid-bulk" data-action="edit">
                        <i class="fa-solid fa-pencil"></i> {{ __('crud.bulk.actions.edit') }}
                    </a>
                </li>
            @elseif ($bulk === \App\Renderers\Layouts\Layout::ACTION_DELETE)
                @if ($hasOthers) <li class="divider"></li> @endif
            <li>
                <a href="#" class="text-red datagrid-submit" data-action="delete">
                    <i class="fa-solid fa-trash"></i> {{ __('crud.remove') }}
                </a>
            </li>
            @elseif (is_array($bulk))
                @php $hasOthers = true; @endphp
            <li>
                <a href="#" class="datagrid-submit" data-action="{{ $bulk['action'] }}">
                    @if (!empty($bulk['icon'])) <i class="{{ $bulk['icon'] }}"></i>@endif
                    {{ __($bulk['label']) }}
                </a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
<a href="#" class="btn btn-default btn-disabled datagrid-spinner" style="display:none">
    <i class="fa-solid fa-spinner fa-spin"></i>
</a>
<input type="hidden" name="action" value="" />

@section('modals')
    @parent
    <div class="modal fade" id="datagrid-bulk-delete" tabindex="-1" role="dialog" aria-labelledby="clickConfirmLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-2xl">
                <div class="modal-body text-center">

                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('crud.click_modal.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ __('crud.delete_modal.title') }}</h4>

                    <p class="mt-3">{{ __('crud.bulk.delete.warning') }}<br />{{ __('crud.delete_modal.permanent') }}</p>

                    <div class="py-5">
                        <button type="button" class="btn px-8 rounded-full mr-5" data-dismiss="modal">{{ __('crud.cancel') }}</button>
                        <button type="button" class="btn btn-danger px-8 ml-5 rounded-full" id="datagrid-action-confirm">
                            <span class="fa-solid fa-trash"></span>
                            <span class="remove-button-label">{{ __('crud.remove') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
