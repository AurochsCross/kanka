<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Models\Entity;
use App\Models\MiscModel;
use App\Traits\GuestAuthTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MentionController extends Controller
{
    /**
     * Guest Auth Trait
     */
    use GuestAuthTrait;

    /**
     * @param Entity $entity
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Entity $entity)
    {
        if (empty($entity->child)) {
            abort(404);
        }
        // Policies will always fail if they can't resolve the user.
        if (Auth::check()) {
            $this->authorize('view', $entity->child);
        } else {
            $this->authorizeEntityForGuest(\App\Models\CampaignPermission::ACTION_READ, $entity->child);
        }

        $ajax = request()->ajax();
        $mentions = $entity
            ->targetMentions()
            ->with(['campaign', 'post', 'post.entity', 'entity'])
            ->paginate();
        return view('entities.pages.mentions.mentions', compact(
            'ajax',
            'entity',
            'mentions'
        ));
    }
}
