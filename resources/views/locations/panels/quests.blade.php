<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title">
            {{ __('entities.quests') }}
        </h3>
    </div>
    <div class="box-body">

        <?php  $r = $model->relatedQuests()->paginate(); ?>
        <table id="location-quests" class="table table-hover ">
            <tbody><tr>
                <th class="avatar"><br /></th>
                <th>{{ __('quests.fields.name') }}</th>
                <th class="hidden-sm">{{ __('quests.fields.role') }}</th>
                <th class="visible-sm">{{ __('quests.fields.type') }}</th>
                <th class="visible-sm">{{ __('quests.fields.quest') }}</th>
                @if ($campaignService->enabled('locations'))
                    <th class="visible-sm">{{ __('quests.fields.locations') }}</th>
                @endif
                @if ($campaignService->enabled('characters'))
                <th>{{ __('quests.fields.characters') }}</th>
                @endif
                <th>{{ __('quests.fields.is_completed') }}</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($r as $quest)
                <tr>
                    <td>
                        <a class="entity-image" style="background-image: url('{{ $quest->thumbnail() }}');" title="{{ $quest->name }}" href="{{ route('quests.show', $quest->id) }}"></a>
                    </td>
                    <td>
                        {!! $quest->tooltipedLink() !!}
                    </td>
                    <td>
                        {{ $quest->pivot->role }}
                    </td>
                    <td class="visible-sm">{{ $quest->type }}</td>
                    <td class="visible-sm">
                        @if ($quest->quest)
                        {!! $quest->quest->tooltipedLink() !!}
                        @endif
                    </td>
                    @if ($campaignService->enabled('locations'))
                        <td class="visible-sm">
                            {{ $quest->locations()->count() }}
                        </td>
                    @endif
                    @if ($campaignService->enabled('characters'))
                    <td>
                        {{ $quest->characters()->count() }}
                    </td>
                    @endif
                    <td>
                        @if ($quest->is_completed) <i class="fa-solid fa-check-circle"></i> @endif
                    </td>
                    <td class="text-right">
                        <a href="{{ route('quests.show', [$quest]) }}" class="btn btn-xs btn-primary">
                            <i class="fa-solid fa-eye" aria-hidden="true"></i> <span class="visible-sm">{{ __('crud.view') }}</span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if ($r->hasPages())
        <div class="box-footer text-right">
            {{ $r->links() }}
        </div>
    @endif
</div>
