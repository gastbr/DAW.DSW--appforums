<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = new CommunityLinkQuery();
        $links = $query->getAll()->paginate(10);

/*         if (request()->exists('text')) {
            $links = $query->search(request()->get('text'));
        } else if (request()->exists('popular')) {
            $links = $query->getMostPopular();
        } else {
            $links = $query->getAll();
        }
 */
        //$links = $links->latest('updated_at');
        return response()->json($links, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
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
