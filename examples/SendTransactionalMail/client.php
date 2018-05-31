<?php
namespace Examples\GetUser;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\SendTransactionalMailRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$accountId = 1; // Recipient
$transactionalMailId = 1; // Mail

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

    if ($response->isSuccessful()) {
        print '<pre>';
        print_r($response->getData());
        print '</pre>';
    } else {
        var_dump($response->getData());
    }
} catch (RequestException $exception) {
    http_response_code(400);
    
    print $exception->getMessage();
}
