<?php
namespace OneCommunity\Requests;

use JwtApi\Client\Request;

class SaveVariableRequest extends Request
{
    /**
     * @var int|float|string|null
     */
    protected $customValue;

    /**
     * @var int
     */
    protected $modelId;

    /**
     * @var int
     */
    protected $variableKeyId;

    /**
     * @var int
     */
    protected $variableValueId;

    /**
     * @var array
     */
    protected $substitutions;

    /**
     * @param int|float|string|null $customValue
     */
    public function __construct(int $modelId, int $variableKeyId, int $variableValueId = null, $customValue = null)
    {
        $this->modelId = $modelId;
        $this->variableKeyId = $variableKeyId;
        $this->variableValueId = $variableValueId;
        $this->customValue = $customValue;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'variables/save';
    }

    public function getPayload(): ?array
    {
        return [
            'key' => ['id' => $this->variableKeyId],
            'value' => ['id' => $this->variableValueId],
            'model_id' => $this->modelId,
            'custom_value' => $this->customValue
        ];
    }

    public function setModelId(int $id): self
    {
        $this->modelId = $id;

        return $this;
    }

    public function getModelId(): int
    {
        return $this->modelId;
    }

    public function setVariableKeyId(int $id): self
    {
        $this->variableKeyId = $id;

        return $this;
    }

    public function getVariableKeyId(): int
    {
        return $this->variableKeyId;
    }

    public function setVariableValueId(int $id): self
    {
        $this->variableValueId = $id;

        return $this;
    }

    public function getVariableValueId(): ?int
    {
        return $this->variableValueId;
    }

    /**
     * @param int|float|string|null $value
     */
    public function setCustomValue($value): self
    {
        $this->custom_value = $value;

        return $this;
    }

    /**
     * @return int|float|string|null
     */
    public function getCustomValue()
    {
        return $this->custom_value;
    }
}
