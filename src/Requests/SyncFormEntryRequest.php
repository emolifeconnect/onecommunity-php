<?php
namespace OneCommunity\Requests;

/**
 * Add or update (for editable forms) a form entry of forms created through 'SyncFormRequest' (see examples).
 */
class SyncFormEntryRequest extends Request
{
    public function __construct(int $accountId, string $form)
    {
        $this->setData('account.id', $accountId);
        $this->setData('form.name', $form);
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'form_entries/sync';
    }

    public function getPayload(): ?array
    {
        $data = $this->data;

        $data['fields'] = array_values($data['fields'] ?? []);

        return $data;
    }

    function field(string $field, $value): self
    {
        if (is_array($value)) {
            $key = 'choices';

            foreach ($value as &$choice) {
                $choice = $this->prefix($choice);
            }
        } else {
            $key = 'value';
        }

        return $this->setData("fields.{$field}", [
            'name' => $this->prefix($field),
            $key => $value,
        ]);
    }

    protected function prefix(string $name): string
    {
        return $this->getData('form.name').':'.$name;
    }
}
