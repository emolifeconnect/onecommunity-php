<?php
namespace Examples\PurchasePaymentTerms;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\PurchasePaymentTermsRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$page = 1;
$perPage = 10;

$filters = [
    // Check if the associated transaction is authorised
    'authorised' => true,

    // Only retrieve purchase payment terms of purchases with product IDs...
    'products' => [1],
];

try {
    $request = new PurchasePaymentTermsRequest;
    $request->setPage($page);
    $request->setPerPage($perPage);
    $request->setFilters($filters);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
