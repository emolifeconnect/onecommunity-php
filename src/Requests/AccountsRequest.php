<?php
namespace OneCommunity\Requests;

class AccountsRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'accounts';
    }
}
