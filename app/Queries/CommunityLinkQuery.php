<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery
{
    public function getByChannel(Channel $channel)
    {
        return $channel->communityLinks()->where('approved', true);
    }

    public function getAll()
    {
        return CommunityLink::where('approved', true);
    }

    public function getMostPopular()
    {
        return CommunityLink::where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc');
    }

    public function getMostPopularByChannel(Channel $channel)
    {
        return $channel->communityLinks()->where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc');
    }

    public function getByUser($userId)
    {
        return CommunityLink::where('user_id', $userId);
    }

    public function search($text)
    {
        return CommunityLink::where('title', 'LIKE', "%{$text}%");
    }
}
