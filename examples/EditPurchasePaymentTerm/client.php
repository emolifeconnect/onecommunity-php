<?php
namespace Examples\EditPurchasePaymentTerm;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\EditPurchasePaymentTermRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$purchasePaymentTermId = 1;

try {
    $request = new EditPurchasePaymentTermRequest($purchasePaymentTermId);

    $request->setTitle('Invoice of April, term 2');
    $request->setReference('april-2');

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
