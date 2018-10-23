<?php
namespace OneCommunity\Requests;

class SendTransactionalMailRequest extends Request
{
    /**
     * @var int
     */
    protected $accountId;

    /**
     * @var int
     */
    protected $transactionalMailId;

    /**
     * @var array
     */
    protected $substitutions;

    public function __construct(int $accountId, int $transactionalMailId, array $substitutions = [])
    {
        $this->accountId = $accountId;
        $this->transactionalMailId = $transactionalMailId;
        $this->substitutions = $substitutions;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return implode('/', ['transactional_mails', $this->transactionalMailId, 'send', $this->accountId]);
    }

    public function getPayload(): ?array
    {
        return ['substitutions' => $this->substitutions];
    }

    public function setAccountId(int $id): self
    {
        $this->accountId = $id;

        return $this;
    }

    public function getAccountId(): int
    {
        return $this->accountId;
    }

    public function setTransactionalMailId(int $id): self
    {
        $this->transactionalMailId = $id;

        return $this;
    }

    public function getTransactionalMailId(): int
    {
        return $this->transactionalMailId;
    }

    public function setSubstitutions(array $substitutions): self
    {
        $this->substitutions = $substitutions;

        return $this;
    }

    public function getSubstitutions(): array
    {
        return $this->substitutions;
    }
}
