<?php
namespace Examples\EditPurchase;

require_once "../../vendor/autoload.php";

use DateTimeImmutable;
use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\EditPurchaseRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$purchaseId = 1;
$today = new DateTimeImmutable;

try {
    $request = new EditPurchaseRequest($purchaseId);

    $request->setReference('#REF1');
    $request->setEndDate($today);

    $response = $client->send($request);

    if ($response->isSuccessful()) {
        print '<pre>';
        print_r($response->getData());
        print '</pre>';
    } else {
        var_dump($response);
    }
} catch (RequestException $exception) {
    http_response_code(400);
    
    print $exception->getMessage();
}
