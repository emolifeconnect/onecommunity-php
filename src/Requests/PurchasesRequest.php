<?php
namespace OneCommunity\Requests;

class PurchasesRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'purchases';
    }
}
