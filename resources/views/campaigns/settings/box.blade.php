@if (isset($boosted) && $boosted && !$campaign->boosted())
    <div class="box box-solid box-warning flex flex-wrap flex-col" id="{{ $module }}">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="{{ $icon }}"></i> {{ __('entities.' . $module) }}
            </h3>
        </div>
        <div class="box-body select-none">
            <p>{{ __('campaigns.settings.helpers.' . $module) }}</p>
        </div>
        <div class="box-footer checkbox text-center mt-auto">
            <i>{!! __('campaigns.settings.boosted', ['boosted' => link_to_route('front.pricing', __('crud.boosted_campaigns'), '#boost')]) !!}</i>
        </div>
    </div>
@else
    <div class="box box-module box-solid flex flex-wrap flex-col select-none {{ $campaign->enabled($module) ? 'box-success' : 'box-default' }}" id="{{ $module }}" data-url="{{ route('campaign.modules.toggle', ['module' => $module]) }}">
        <div class="box-header with-border">
            <h3 class="box-title">
                <i class="{{ $icon }}"></i> {{ __('entities.' . $module) }}
            </h3>
        </div>
        <div class="box-body">
            <p>{{ __('campaigns.settings.helpers.' . $module) }}</p>
            <div class="loading text-center py-5" style="display: none">
            <i class="fa-solid fa-spin fa-spinner fa-2x"></i>
            </div>
        </div>
    </div>
@endif
