<?php
namespace OneCommunity;

use JwtApi\Client\Client as BaseClient;
use JwtApi\Client\Exceptions\ClientException;
use JwtApi\Client\Response;
use JwtApi\Client\Request;
use OneCommunity\Exceptions\RequestException;

class Client extends BaseClient
{
    const API_URL = 'http://127.0.0.1/One/api/public/v1/';
    const VERSION = '0.6.0';

    public function __construct(string $apiKey, int $userId, string $projectName)
    {
        parent::__construct(static::API_URL, $apiKey, [
            'user' => $userId,
            'project' => $projectName
        ]);
    }

    /**
     * @throws RequestException
     */
    public function send(Request $request): Response
    {
        try {
            return parent::send($request);
        } catch (ClientException $exception) {
            throw new RequestException($exception->getMessage());
        }
    }

    public static function version(): string
    {
        return 'OneCommunity/'.self::VERSION.' '.parent::version();
    }
}
