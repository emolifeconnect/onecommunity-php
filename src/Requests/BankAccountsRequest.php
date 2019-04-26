<?php
namespace OneCommunity\Requests;

class BankAccountsRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'bank_accounts';
    }
}
