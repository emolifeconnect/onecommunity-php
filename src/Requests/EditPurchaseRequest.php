<?php
namespace OneCommunity\Requests;

use DateTimeImmutable;
use DateTimeInterface;

class EditPurchaseRequest extends Request
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
        return "purchases/{$this->purchaseId}/edit";
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

    public function setEndDate(DateTimeInterface $date): self
    {
        return $this->setData('end_date', $date->format('Y-m-d'));
    }

    public function getEndDate(): ?DateTimeImmutable
    {
        $endDate = $this->getData('end_date');

        return $endDate ? new DateTimeImmutable($endDate) : null;
    }

    public function setReference(string $reference): self
    {
        return $this->setData('reference', $reference);
    }

    public function getReference(): ?string
    {
        return $this->getData('reference');
    }
}
