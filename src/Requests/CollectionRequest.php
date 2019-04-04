<?php
namespace OneCommunity\Requests;

abstract class CollectionRequest extends Request
{
    public function getMethod(): string
    {
        return 'GET';
    }

    public function getParameters(): ?array
    {
        return $this->data;
    }

    public function setPage(int $page): self
    {
        return $this->setData('page', $page);
    }

    public function getPage(): int
    {
        return $this->getData('page');
    }

    public function setPerPage(int $perPage): self
    {
        return $this->setData('per_page', $perPage);
    }

    public function getPerPage(): int
    {
        return $this->getData('per_page');
    }

    public function setFilters(array $filters): self
    {
        return $this->setData('filters', $filters);
    }

    public function getFilters(): array
    {
        return $this->getData('filters');
    }
}
