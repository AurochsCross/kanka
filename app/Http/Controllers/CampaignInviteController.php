<?php

namespace App\Http\Controllers;

use App\Facades\CampaignLocalization;
use App\Http\Requests\StoreCampaignInvite;
use App\Models\CampaignInvite;

class CampaignInviteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaign = CampaignLocalization::getCampaign();
        $this->authorize('invite', $campaign);
        $ajax = request()->ajax();

        if (!$campaign->canHaveMoreMembers()) {
            return view('cruds.forms.limit')
                ->with('key', 'members')
                ->with('skipImage', true)
                ->with('name', 'campaign_roles');
        }

        return view('campaigns.invites.create', compact('campaign', 'ajax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignInvite $request)
    {
        $campaign = CampaignLocalization::getCampaign();
        $this->authorize('invite', $campaign);

        $invitation = CampaignInvite::create(
            $request->only('email', 'role_id', 'type_id', 'validity')
        );

        return redirect()->route('campaign_users.index')
            ->with(
                'success_raw',
                __(
                    'campaigns.invites.create.' . ($invitation->isEmail() ? 'success' : 'success_link'),
                    ['link' => link_to_route('campaigns.join', route('campaigns.join', $invitation->token), $invitation->token)]
                )
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampaignInvite  $campaignUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignInvite $campaignInvite)
    {
        $this->authorize('delete', $campaignInvite);

        $campaignInvite->delete();
        return redirect()->route('campaign_users.index')
            ->with('success', trans('campaigns.invites.destroy.success'));
    }
}
