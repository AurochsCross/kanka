<?php

namespace App\Http\Controllers\Families;

use App\Facades\CampaignLocalization;
use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Services\Families\FamilyTreeService;
use App\Traits\GuestAuthTrait;

class FamilyTreeController extends Controller
{
    use GuestAuthTrait;

    protected FamilyTreeService $service;

    public function __construct(FamilyTreeService $service)
    {
        $this->service = $service;
    }

    public function index(Family $family)
    {
        // Policies will always fail if they can't resolve the user.
        if (auth()->check()) {
            $this->authorize('view', $family);
        } else {
            $this->authorizeForGuest(\App\Models\CampaignPermission::ACTION_READ, $family);
        }

        $this->service->family($family);
        $campaign = CampaignLocalization::getCampaign();

        return view('families.family-tree')
            ->with('family', $family)
            ->with('tree', $this->service->generate())
            ->with('campaign', $campaign)
        ;
    }
}
