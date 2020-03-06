<?php
namespace OneCommunity\Requests;

/**
 * Add or update a form with given pages and fields.
 */
class SyncFormRequest extends Request
{
    const TYPE_DATE = 'generic_date';
    const TYPE_EMAIL = 'generic_email';
    const TYPE_INTEGER = 'generic_integer';
    const TYPE_MONEY = 'generic_money';
    const TYPE_STRING = 'generic_string';
    const TYPE_TEXT = 'generic_text';

    public function __construct(string $name)
    {
        $this->setData('name', $name);
        $this->setData('creates', []);
        $this->setData('updates', []);
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'forms/sync';
    }

    public function getPayload(): ?array
    {
        $data = $this->data;

        $data['pages'] = array_values($data['pages'] ?? []);

        foreach ($data['pages'] as &$page) {
            $page['fields'] = array_values($page['fields'] ?? []);

            foreach ($page['fields'] as &$field) {
                $field['choices'] = array_values($field['choices'] ?? []);
            }
        }

        return $data;
    }

    public function label(?string $value): self
    {
        return $this->setData('label', $value);
    }

    public function title(?string $value): self
    {
        return $this->setData('title', $value);
    }

    public function editable(bool $value): self
    {
        return $this->setData('editable', $value);
    }

    public function allowMultiple(bool $value): self
    {
        return $this->setData('allow_multiple', $value);
    }

    public function page(string $page, string $title = null, array $attributes = []): self
    {
        return $this->setData("pages.{$page}", array_merge([
            'name' => $this->prefix($page),
            'title' => $title,
        ], $attributes));
    }

    public function field(string $page, string $field, string $title, string $type = self::TYPE_STRING, array $attributes = []): self
    {
        return $this->setData("pages.{$page}.fields.{$field}", array_merge([
            'name' => $this->prefix($field),
            'type' => ['name' => $type],
            'title' => $title,
            'enabled' => true,
        ], $attributes));
    }

    public function choice(string $page, string $field, string $choice, string $value, array $attributes = []): self
    {
        return $this->setData("pages.{$page}.fields.{$field}.choices.{$choice}", array_merge([
            'name' => $this->prefix($choice),
            'value' => $value,
            'other' => false,
            'default' => false,
            'enabled' => true,
            'rules' => [],
        ], $attributes));
    }

    protected function prefix(string $name): string
    {
        return $this->getData('name').':'.$name;
    }
}
