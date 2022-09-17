<?php

namespace App\Http\Controllers;

use App\Models\CommunityVote;
use App\Services\CommunityVoteService;
use Illuminate\Http\Request;

class CommunityVoteController extends Controller
{
    /**
     * @var CommunityVoteService
     */
    protected $service;

    /**
     * CommunityVoteController constructor.
     * @param CommunityVoteService $service
     */
    public function __construct(CommunityVoteService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $voting = CommunityVote::voting()->first();

        $models = CommunityVote::published()
            ->orderBy('visible_at', 'DESC')
            ->paginate();

        $recent = CommunityVote::recent()->get();
        return view('community-votes.index', compact('voting', 'models', 'recent'));
    }

    /**
     * @param int $id
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id, $slug = '')
    {
        $this->middleware(['identity']);
        $vote = CommunityVote::where('id', $id)->firstOrFail();

        $recent = CommunityVote::recent()->get();

        return view('community-votes.show', [
            'model' => $vote,
            'recent' => $recent
        ]);
    }

    public function vote(Request $request, CommunityVote $communityVote)
    {
        $this->middleware(['auth', 'identity']);
        $this->authorize('vote', $communityVote);

        $data = $this->service->cast(
            $communityVote,
            auth()->user,
            $request->post('vote', null)
        );

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
