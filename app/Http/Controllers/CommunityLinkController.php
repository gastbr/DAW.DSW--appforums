<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommuntyLinkForm;
use App\Models\CommunityLink;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommunityLinkController extends Controller
{

    public function myLinks(Channel $channel = null)
    {
        if ($channel) {
            $links = $channel->communityLinks()->where('approved', 1)->latest('updated_at')->paginate(25);
        } else {
            $user = Auth::id();
            $links = CommunityLink::where('user_id', $user)->latest('updated_at')->paginate(10);
        }
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('myLinks', compact('links', 'channels'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        if ($channel) {
            $links = $channel->hasMany(CommunityLink::class)->where('approved', 1)->latest('updated_at')->paginate(25);
        } else {
            $links = CommunityLink::where('approved', 1)->latest('updated_at')->paginate(25);
        }
        $channels = Channel::orderBy('title', 'asc')->get();
        return view('dashboard', compact('links', 'channels'));
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
