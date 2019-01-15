<?php
namespace Examples\AddAccount;

require_once "../../vendor/autoload.php";

use DateTimeImmutable;
use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\AddAccountRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "testproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

try {
    $request = new AddAccountRequest;

    // Optionally, add the new contact to group(s).
    $request->addGroupId(168);

    $request->setType(AddAccountRequest::ORGANISATION);
    $request->setTitle('Acme Corporation');

    // Organisation's contact person.
    $request
        ->setGender(AddAccountRequest::MALE)
        ->setFirstName('Jan')
        ->setInfix('van')
        ->setLastName('Egmond')
        ->setDateOfBirth(new DateTimeImmutable('1993-03-24'))
        ->setEmail('janvanegmond@onecommunity.nl')
        ->setSubscribeToMails(true);

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
