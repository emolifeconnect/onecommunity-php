<?php
namespace Examples\Account;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\AccountRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$accountId = 100;

try {
    $request = new AccountRequest($accountId);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
