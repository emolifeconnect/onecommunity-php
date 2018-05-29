<?php
namespace Examples\GetUser;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\UserRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 42;
$projectName = "helloworld";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

try {
    $request = new UserRequest;

    $response = $client->send($request);

    print 'Success: '.$response->getData();
} catch (RequestException $exception) {
    print 'Error: '.$exception->getMessage();
}
