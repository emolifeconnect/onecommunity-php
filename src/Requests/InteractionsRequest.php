<?php
namespace OneCommunity\Requests;

class InteractionsRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'interactions';
    }
}
