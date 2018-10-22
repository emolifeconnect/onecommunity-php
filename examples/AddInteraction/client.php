<?php
namespace Examples\AddInteraction;

require_once "../../vendor/autoload.php";

use DateTimeImmutable;
use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\AddInteractionRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

$accountId = 100;
$subjectTitle = 'External event';
$description = 'Newsletter sign-up';
$contactDate = new DateTimeImmutable;
$finished = false;
$assignedUserId = 2;

try {
    $request = new AddInteractionRequest;
    $request->setAccountId($accountId);
    $request->setSubjectTitle($subjectTitle);
    $request->setDescription($description);
    $request->setContactDate($contactDate);

    // A notification will be sent if $finished is false and a user is assigned
    // $request->setFinished($finished);
    // $request->setAssignedUserId($assignedUserId);

    $response = $client->send($request);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
