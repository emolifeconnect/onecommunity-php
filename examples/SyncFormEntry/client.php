<?php
namespace Examples\SyncFormEntry;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\SyncFormEntryRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$accountId = 123;

try {
    $form = (new SyncFormEntryRequest($accountId, 'vendor:preferences-form'))
        ->field('burger_size', ['lg'])
        ->field('allergies', "Line 1\nLine 2")
        ->field('milk_selection', ['confirm']);

    $response = $client->send($form);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
