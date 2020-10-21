<?php
namespace OneCommunity\Requests;

class SyncAccountRequest extends AddAccountRequest
{
    public function __construct(string $email, int $id = null)
    {
        parent::__construct();

        $this->setEmail($email);

        if ($id) {
            $this->setData('id', $id);
        }
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'accounts/sync';
    }

    public function getPayload(): ?array
    {
        return $this->data;
    }
}