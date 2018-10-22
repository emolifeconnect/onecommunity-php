<?php
namespace Examples\SendTransactionalMail;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\SendTransactionalMailRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$accountId = 5; // Recipient
$transactionalMailId = 17; // Mail

try {
    $request = new SendTransactionalMailRequest($accountId, $transactionalMailId);

    $request->setSubstitutions([
        'note' => 'sponsored by One Community',
        'products' => [
            [
                'title' => 'Coffee',
                'quantity' => 2
            ],
            [
                'title' => 'Beer',
                'quantity' => 1
            ]
        ]
    ]);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
