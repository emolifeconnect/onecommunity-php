<?php
namespace OneCommunity\Requests;

use DateTimeInterface;

class AddOrderRequest extends Request
{
    /**
     * @var array
     */
    protected $purchases = [];

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'orders/add';
    }

    public function getPayload(): ?array
    {
        return $this->data;
    }

    /**
     * Amounts in cents.
     */
    public function addPurchase(int $productId, int $quantity = 1, int $amount = null, DateTimeInterface $startDate = null, DateTimeInterface $endDate = null)
    {
        $purchase = [
            'product' => ['id' => $productId],
            'quantity' => $quantity,
            'amount' => $amount
        ];

        if ($startDate) {
            $purchase['start_date'] = $startDate->format('Y-m-d');
        }

        if ($endDate) {
            $purchase['end_date'] = $endDate->format('Y-m-d');
        }

        $this->purchases[] = $purchase;

        return $this->setData('purchases', $this->purchases);
    }

    public function setAccountId(int $id): self
    {
        return $this->setData('account.id', $id);
    }

    public function getAccountId(): int
    {
        return $this->getData('account.id');
    }

    public function setPaymentMethodId(int $id): self
    {
        return $this->setData('payment_method.id', $id);
    }

    public function getPaymentMethodId(): int
    {
        return $this->getData('payment_method.id');
    }

    // Mandatory for iDEAL only
    public function setIssuer(string $issuer): self
    {
        return $this->setData('issuer', $issuer);
    }

    public function getIssuer(): string
    {
        return $this->getData('issuer');
    }

    // Mandatory for SEPA Direct Debit only
    public function setIban(string $iban): self
    {
        return $this->setData('bank_account.iban', $iban);
    }

    public function getIban(): string
    {
        return $this->getData('bank_account.iban');
    }

    public function setAccountHolder(string $accountHolder): self
    {
        return $this->setData('bank_account.account_holder', $accountHolder);
    }

    public function getAccountHolder(): string
    {
        return $this->getData('bank_account.account_holder');
    }
}
