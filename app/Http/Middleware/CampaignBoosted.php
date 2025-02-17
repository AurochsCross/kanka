<?php

namespace App\Http\Middleware;

use App\Facades\CampaignLocalization;
use App\Models\Campaign;
use Closure;

class CampaignBoosted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Make sure we have an id
        $campaign = CampaignLocalization::getCampaign();
        if (empty($campaign)) {
            return redirect()->route('login')
                ->withErrors(__('You\'ve been banned'));
        }

        if (!$campaign->boosted()) {
            if ($request->is('api/*')) {
                return response()->json([
                    'error' => 'This feature is reserved to boosted campaigns.'
                ]);
            }
            return redirect()->route('dashboard')->withErrors(__('crud.errors.boosted'));
        }

        return $next($request);
    }
}
