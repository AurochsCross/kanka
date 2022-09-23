@php
    $pricingOptions = [
        '#boost'
    ];
    if (isset($campaign) && $campaign instanceof \App\Models\Campaign) {
        $pricingOptions['callback'] = $campaign->id;
    } elseif (isset($campaign) && $campaign instanceof \App\Services\CampaignService) {
        $pricingOptions['callback'] = $campaignService->campaign()->id;
    }
@endphp
<div class="alert alert-info">
    {!! __($key, ['superboosted-campaign' => link_to_route('front.pricing', __('concept.superboosted-campaign'), $pricingOptions)]) !!}
</div>
