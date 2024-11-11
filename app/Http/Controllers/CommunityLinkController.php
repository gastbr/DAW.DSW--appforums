<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommuntyLinkForm;
use App\Models\CommunityLink;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $query = new CommunityLinkQuery();
        if ($channel) {
            if (request()->exists('popular')) {
                $links = $query->getMostPopularByChannel($channel);
            } else {
                $links = $query->getByChannel($channel);
            }
        } else {
            if (request()->exists('popular')) {
                $links = $query->getMostPopular();
            } else {
                $links = $query->getAll();
            }
        }

        $channels = Channel::orderBy('title', 'asc')->get();
        return view('dashboard', compact('links', 'channels'));
    }

    public function myLinks()
    {
        $query = new CommunityLinkQuery();
        $links = $query->getByUser(Auth::id());
        return view('mylinks', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommuntyLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);
        $existing = $link->hasAlreadyBeenSubmitted();
        if ($existing) {
            return back();
        } else {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();
            if ($link->approved) {
                return back()->with('success', 'Your link was posted successfully.');
            } else {
                return back()->with('notice', 'Your link was sent successfully but is pending approval.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}
