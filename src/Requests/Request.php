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
     * @param mixed $value
     */
    public function setData(string $key, $value): self
    {
        $data = &$this->data;
        $keys = explode('.', $key);

        while (count($keys) > 1) {
            $key = array_shift($keys);

            if (!isset($data[$key]) || !is_array($data[$key])) {
                $data[$key] = [];
            }

            $data = &$data[$key];
        }

        $data[array_shift($keys)] = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData(string $key = null)
    {
        if ($key === null) {
            return $this->data;
        }

        $data = $this->data;
        $keys = explode('.', $key);

        while (count($keys) > 0) {
            $key = array_shift($keys);

            if (isset($data[$key]) && (is_array($data[$key]) || count($keys) == 0)) {
                $data = $data[$key];
            } else {
                $data = null;
            }
        }

        return $data;
    }
}
