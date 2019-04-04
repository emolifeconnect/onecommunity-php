<?php
namespace Examples\Purchases;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\PurchasesRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$page = 1;
$perPage = 10;

$filters = [
    // 'authorised' => true,
    'references' => ['null'],

    // Only retrieve purchases for product IDs...
    'products' => [1],

    // Only retrieve purchases for accounts in group IDs...
    // 'groups' => [4]

    // Only retrieve purchases for accounts in segment IDs...
    // 'segments' => [4]
];

try {
    $request = new PurchasesRequest;
    $request->setPage($page);
    $request->setPerPage($perPage);
    $request->setFilters($filters);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
