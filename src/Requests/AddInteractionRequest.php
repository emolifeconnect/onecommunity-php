<?php
namespace OneCommunity\Requests;

use DateTimeImmutable;
use DateTimeInterface;

class AddInteractionRequest extends Request
{
    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'interactions/add';
    }

    public function getPayload(): ?array
    {
        return $this->data;
    }

    public function setAccountId(int $accountId): self
    {
        return $this->setData('account.id', $accountId);
    }

    public function getAccountId(): int
    {
        return $this->getData('account.id');
    }

    public function setSubjectId(int $subjectId): self
    {
        return $this->setData('subject.id', $subjectId);
    }

    public function getSubjectId(): int
    {
        return $this->getData('subject.id');
    }

    public function setSubjectTitle(string $subjectTitle): self
    {
        return $this->setData('subject.title', $subjectTitle);
    }

    public function getSubjectTitle(): string
    {
        return $this->getData('subject.title');
    }

    public function setDescription(string $description): self
    {
        return $this->setData('description', $description);
    }

    public function getDescription(): string
    {
        return $this->getData('description');
    }

    public function setContactDate(DateTimeInterface $contactDate = null): self
    {
        if ($contactDate) {
            $contactDate = $contactDate->format('Y-m-d');
        }

        return $this->setData('contact_date', $contactDate);
    }

    public function getContactDate(): ?DateTimeImmutable
    {
        $contactDate = $this->getData('contact_date');

        return $contactDate ? new DateTimeImmutable($contactDate) : null;
    }

    public function setFinished(bool $finished): self
    {
        return $this->setData('finished', $finished);
    }

    public function getFinished(): bool
    {
        return $this->getData('finished');
    }

    public function setAssignedUserId(int $assignedUserId): self
    {
        return $this->setData('assigned_user.id', $assignedUserId);
    }

    public function getAssignedUserId(): int
    {
        return $this->getData('assigned_user.id');
    }
}
