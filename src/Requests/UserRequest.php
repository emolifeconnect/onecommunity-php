<?php
namespace OneCommunity\Requests;

class UserRequest extends Request
{
    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return 'auth/user';
    }
}
