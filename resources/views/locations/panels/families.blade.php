<?php
/**
 * @var \App\Models\Location $model
 * @var \App\Models\Family $family
 */
$filters = [];
if (request()->has('location_id')) {
    $filters['location_id'] = request()->get('location_id');
}
?>
<div class="box box-solid" id="location-families">
    <div class="box-header">
        <h3 class="box-title">
            {{ __('locations.show.tabs.families') }}
        </h3>
    </div>
    <div class="box-body">

        <p class="help-block">
            {{ __('locations.helpers.families') }}
        </p>


        <div class="row">
            <div class="col-md-6">
                @include('cruds.datagrids.sorters.simple-sorter', ['target' => '#location-families'])
            </div>
            <div class="col-md-6 text-right">

                @if (request()->has('location_id'))
                    <a href="{{ route('locations.families', $model) }}" class="btn btn-default btn-sm pull-right">
                        <i class="fa-solid fa-filter"></i> {{ __('crud.filters.all') }} ({{ $model->allFamilies()->count() }})
                    </a>
                @else
                    <a href="{{ route('locations.families', [$model, 'location_id' => $model->id]) }}" class="btn btn-default btn-sm pull-right">
                        <i class="fa-solid fa-filter"></i> {{ __('crud.filters.direct') }} ({{ $model->families()->count() }})
                    </a>
                @endif
            </div>
        </div>

        <?php  $r = $model->allFamilies()->filter($filters)->simpleSort($datagridSorter)->with(['location', 'family', 'entity', 'entity.tags'])->paginate(); ?>

        <table id="families" class="table table-hover margin-top ">
            <tbody><tr>
                <th class="avatar"><br /></th>
                <th>{{ __('families.fields.name') }}</th>
                @if ($campaignService->enabled('locations'))
                    <th>{{ __('entities.location') }}</th>
                @endif
                <th>{{ __('entities.family') }}</th>
                <th>{{ __('crud.fields.type') }}</th>
                <th>&nbsp;</th>
            </tr>
            @foreach ($r as $family)
                <tr>
                    <td>
                        <a class="entity-image" style="background-image: url('{{ $family->thumbnail() }}');" title="{{ $family->name }}" href="{{ route('families.show', $family->id) }}"></a>
                    </td>
                    <td>
                        {!! $family->tooltipedLink() !!}
                    </td>
                    @if ($campaignService->enabled('locations'))
                        <td>
                            @if ($family->location)
                                {!! $family->location->tooltipedLink() !!}
                            @endif
                        </td>
                    @endif
                    <td>
                        @if ($family->family)
                            {!! $family->family->tooltipedLink() !!}
                        @endif
                    </td>
                    <td>{{ $family->type }}</td>
                    <td class="text-right">
                        <a href="{{ route('families.show', [$family]) }}" class="btn btn-xs btn-primary">
                            <i class="fa-solid fa-eye" aria-hidden="true"></i> {{ __('crud.view') }}
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $r->fragment('location-families')->links() }}
    </div>
</div>
