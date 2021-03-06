<?php
namespace Examples\SaveVariable;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\SaveVariableRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$modelId = 5; // Account ID
$variableKeyId = 2; // Variable Key ID (e.g. for T-shirt size)
$variableValueId = 6; // Variable Value ID

$hasOptions = true;

try {
    $request = new SaveVariableRequest($modelId, $variableKeyId);

    if ($hasOptions) {
        $request->setVariableValueId($variableValueId);
    } else {
        $request->setCustomValue("XXL");
    }

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
