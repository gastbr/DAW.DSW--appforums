<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery
{
    public static function getByChannel(Channel $channel = null)
    {
        return $channel->communityLinks()->where('approved', 1);
    }

    public function getAll()
    {
        return CommunityLink::where('approved', 1)->latest('updated_at')->paginate(25);
    }

    public function getMostPopular()
    {
        #ToDo
    }
}
