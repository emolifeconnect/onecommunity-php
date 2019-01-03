<?php
namespace OneCommunity\Requests;

class DeleteInteractionRequest extends Request
{
    /**
     * @var int
     */
    protected $interactionId;

    public function __construct(int $interactionId)
    {
        $this->interactionId = $interactionId;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return "interactions/{$this->interactionId}/delete";
    }
}
