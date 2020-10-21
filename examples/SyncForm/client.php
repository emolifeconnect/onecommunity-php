<?php
namespace Examples\SyncForm;

require_once "../../vendor/autoload.php";

use OneCommunity\Client;
use OneCommunity\Exceptions\RequestException;
use OneCommunity\Requests\SyncFormRequest;

$apiKey = "DRSt3jWF4YqRZSi6Z8xzSAtBpVTauJ6b";
$userId = 1;
$projectName = "yourproject";

$client = new Client($apiKey, $userId, $projectName);
$client->loadPrivateKey("../private_rsa.pem");

try {
    $form = (new SyncFormRequest('vendor:preferences-form'))
        ->label('Custom Preferences Form')
        ->title('Preferences')
        ->editable(true)
        ->allowMultiple(false)
        ->page('food', 'Burger selection')
            ->field('food', 'burger_size', 'Which burger would you like?')
                ->choice('food', 'burger_size', 'sm', 'Small')
                ->choice('food', 'burger_size', 'md', 'Medium')
                ->choice('food', 'burger_size', 'lg', 'Large')
            ->field('food', 'allergies', 'Extra information (e.g. allergies)', SyncFormRequest::TYPE_TEXT)
        ->page('drinks', 'Drinks')
            ->field('drinks', 'milk_selection', 'Add milk to coffee?')
                ->choice('drinks', 'milk_selection', 'confirm', 'Yes, please');

    $response = $client->send($form);

    dump($response->getData());
} catch (RequestException $exception) {
    http_response_code(400);

    dump($exception->getMessage());
}
