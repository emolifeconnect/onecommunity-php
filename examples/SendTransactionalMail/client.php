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

    $subs = json_decode('{"lottery":{"Name":"Lot of Happiness","Description":"*loterij*","Price":1},"incasso":{"Tickets":"ZZ912530, ZZ867280, ZZ798350, ZZ798014, ZZ736707","Amount":5},"extra":{"hello":"world"}}', true);

    $request->setSubstitutions($subs);

    $response = $client->send($request);

    if ($response->isSuccessful()) {
        print '<pre>';
        print_r($response->getData());
        print '</pre>';
    } else {
        var_dump($response);
        var_dump($response->getData());
    }
} catch (RequestException $exception) {
    http_response_code(400);
    
    print $exception->getMessage();
}
