<?php
namespace OneCommunity\Requests;

class ActionCampaignsRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'action_campaigns';
    }
}
