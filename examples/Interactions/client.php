<?php
namespace Examples\Interactions;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\InteractionsRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$page = 1;
$perPage = 10;

$filters = [
    // Only retrieve interactions created by user $userId...
    'users' => [$userId],

    // Only retrieve interactions for account IDs...
    // 'accounts' => [100],

    // Only retrieve finished interactions...
    // 'finished' => [true],

    // Only retrieve interactions with subject IDs...
    // 'interaction_subjects' => [4]
];

try {
    $request = new InteractionsRequest;
    $request->setPage($page);
    $request->setPerPage($perPage);
    $request->setFilters($filters);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
