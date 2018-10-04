<?php
namespace OneCommunity\Requests;

use DateTimeImmutable;
use DateTimeInterface;

class ApplyTransactionActionRequest extends Request
{
    const AUTHORISE = 'authorise';
    const FINALIZE = 'finalize';
    const PAUSE = 'pause';
    const CANCEL = 'cancel';
    const REVERSE = 'reverse';
    const REFUND = 'refund';

    /**
     * @var int
     */
    protected $transactionId;

    public function __construct(int $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return "transactions/{$this->transactionId}/apply_action";
    }

    public function getPayload(): array
    {
        return $this->data;
    }

    public function setTransactionId(int $id): self
    {
        $this->transactionId = $id;

        return $this;
    }

    public function getTransactionId(): int
    {
        return $this->transactionId;
    }

    public function setPaymentDate(DateTimeInterface $date): self
    {
        return $this->setData('payment_date', $date->format('Y-m-d'));
    }

    public function getPaymentDate(): ?DateTimeImmutable
    {
        $paymentDate = $this->getData('payment_date');

        return $paymentDate ? new DateTimeImmutable($paymentDate) : null;
    }

    public function setAction(string $action): self
    {
        return $this->setData('action', $action);
    }

    public function getAction(): ?string
    {
        return $this->getData('action');
    }
}
