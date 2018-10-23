<?php
namespace OneCommunity\Requests;

class AccountRequest extends Request
{
    /**
     * @var int
     */
    protected $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return implode('/', ['accounts', $this->id]);
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
