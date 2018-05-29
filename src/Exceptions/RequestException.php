<?php
namespace OneCommunity\Exceptions;

use Exception;
use JwtApi\Client\Exceptions\RequestException as BaseException;

class RequestException extends BaseException
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
