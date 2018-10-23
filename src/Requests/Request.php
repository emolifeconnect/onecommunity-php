<?php
namespace OneCommunity\Requests;

use JwtApi\Client\Request as BaseRequest;

abstract class Request extends BaseRequest
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var mixed $data
     */
    public function setData(string $key, $data): self
    {
        $this->data[$key] = $data;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData(string $key)
    {
        return $this->data[$key] ?? null;
    }
}
