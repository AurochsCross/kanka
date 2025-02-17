@if ($campaignService->enabled('locations') && $model->location)
    <li class="list-group-item">
        <b>
            <i class="ra ra-tower" title="{{ __('entities.location') }}"></i> <span class="visible-xs-inline">{{ __('entities.location') }}</span>
        </b>
        <span class="pull-right">
            {!! $model->location->tooltipedLink() !!}@if ($model->location->parentLocation),
                {!! $model->location->parentLocation->tooltipedLink() !!}
            @endif
        </span>
        <br class="clear" />
    </li>
@endif
