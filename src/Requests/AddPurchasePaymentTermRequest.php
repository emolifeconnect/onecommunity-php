<?php
namespace OneCommunity\Requests;

use DateTimeImmutable;
use DateTimeInterface;

class AddPurchasePaymentTermRequest extends Request
{
    /**
     * @var int
     */
    protected $purchaseId;

    public function __construct(int $purchaseId)
    {
        $this->purchaseId = $purchaseId;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return "purchases/{$this->purchaseId}/add_purchase_payment_term";
    }

    public function getPayload(): array
    {
        return $this->data;
    }

    public function setPurchaseId(int $id): self
    {
        $this->purchaseId = $id;

        return $this;
    }

    public function getPurchaseId(): int
    {
        return $this->purchaseId;
    }

    public function setCollectDate(DateTimeInterface $date): self
    {
        return $this->setData('collect_date', $date->format('Y-m-d'));
    }

    public function getCollectDate(): ?DateTimeImmutable
    {
        $collectDate = $this->getData('collect_date');

        return $collectDate ? new DateTimeImmutable($collectDate) : null;
    }

    public function setTitle(string $title): self
    {
        return $this->setData('title', $title);
    }

    public function getTitle(): ?string
    {
        return $this->getData('title');
    }

    /**
     * Amounts in cents.
     */
    public function setAmount(int $amount): self
    {
        return $this->setData('amount', $amount);
    }

    public function getAmount(): ?int
    {
        return $this->getData('amount');
    }

    /**
     * Amounts in cents.
     */
    public function setVatAmount(int $vatAmount): self
    {
        return $this->setData('vat_amount', $vatAmount);
    }

    public function getVatAmount(): ?int
    {
        return $this->getData('vat_amount');
    }
}
