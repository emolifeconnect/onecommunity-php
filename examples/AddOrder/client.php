<?php
namespace Examples\AddOrder;

require_once "../../vendor/autoload.php";

use DateTimeImmutable;
use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\AddOrderRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "testproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

try {
    $request = new AddOrderRequest;

    // Recurring example
    $request->addPurchase(
        1, // Product ID (e.g., monthly donation)
        1, // Quantity
        500, // Amount in cents
        new DateTimeImmutable('2019-01-01'), // Start date (optional)
        new DateTimeImmutable('2020-06-01') // End date (optional)
    );

    $request->setAccountId(1);
    $request->setPaymentMethodId(1); // E.g., SEPA Direct Debit
    $request->setIban('NL99RABO0123456789');
    $request->setAccountHolder('J. van Egmond');

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
