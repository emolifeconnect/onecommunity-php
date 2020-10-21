<?php
namespace Examples\BankAccounts;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\BankAccountsRequest;
use OneCommunity\Requests\CollectionRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$page = 1;
$perPage = 50;

$filters = [
    // Only retrieve bank accounts for account IDs...
    'accounts' => [33, 22, 11],
];

try {
    $request = new BankAccountsRequest;
    $request->setPage($page);
    $request->setPerPage($perPage);
    $request->setFilters($filters);

    $request->setSort('id', CollectionRequest::SORT_DESCENDING);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
