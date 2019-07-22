<?php
namespace OneCommunity\Requests;

class EditPurchasePaymentTermRequest extends Request
{
    /**
     * @var int
     */
    protected $purchasePaymentTermId;

    public function __construct(int $purchasePaymentTermId)
    {
        $this->purchasePaymentTermId = $purchasePaymentTermId;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return "purchase_payment_terms/{$this->purchasePaymentTermId}/edit";
    }

    public function getPayload(): array
    {
        return $this->data;
    }

    public function setReference(string $reference): self
    {
        return $this->setData('reference', $reference);
    }

    public function getReference(): ?string
    {
        return $this->getData('reference');
    }

    public function setTitle(string $title): self
    {
        return $this->setData('title', $title);
    }

    public function getTitle(): ?string
    {
        return $this->getData('title');
    }
}
