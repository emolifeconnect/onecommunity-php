<?php
namespace OneCommunity\Requests;

class PurchasePaymentTermsRequest extends CollectionRequest
{
    public function getUri(): string
    {
        return 'purchase_payment_terms';
    }
}
