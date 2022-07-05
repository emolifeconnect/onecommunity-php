<?php
namespace OneCommunity\Requests;

abstract class CollectionRequest extends Request
{
    const SORT_ASCENDING = 'asc';
    const SORT_DESCENDING = 'desc';

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

    public function getPage(): ?int
    {
        return $this->getData('page');
    }

    public function setPerPage(int $perPage): self
    {
        return $this->setData('perPage', $perPage);
    }

    public function getPerPage(): ?int
    {
        return $this->getData('perPage');
    }

    public function setSearch(string $search): self
    {
        return $this->setData('search', $search);
    }

    public function getSearch(): ?string
    {
        return $this->getData('search');
    }

    public function setAppends(array $appendables): self
    {
        return $this->setData('appends', $appendables);
    }

    public function getAppends(): ?array
    {
        return $this->getData('appends');
    }

    public function setWith(array $loadables): self
    {
        return $this->setData('with', $loadables);
    }

    public function getWith(): ?array
    {
        return $this->getData('with');
    }

    public function setSort(string $attribute, string $direction = self::SORT_ASCENDING): self
    {
        return $this->setData('sort', [$attribute => $direction]);
    }

    public function getSort(): ?array
    {
        return $this->getData('sort');
    }

    public function setFilters(array $filters): self
    {
        return $this->setData('filters', $filters);
    }

    public function getFilters(): ?array
    {
        return $this->getData('filters');
    }
}
