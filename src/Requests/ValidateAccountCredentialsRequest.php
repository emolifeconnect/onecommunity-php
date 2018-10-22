<?php
namespace OneCommunity\Requests;

class ValidateAccountCredentialsRequest extends Request
{
    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'accounts/validate_credentials';
    }

    public function getPayload(): ?array
    {
        return $this->data;
    }

    public function setUsername(string $username): self
    {
        return $this->setData('username', $username);
    }

    public function getUsername(): string
    {
        return $this->getData('username');
    }

    public function setPassword(string $password): self
    {
        return $this->setData('password', $password);
    }

    public function getPassword(): string
    {
        return $this->getData('password');
    }
}
