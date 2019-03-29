<?php

require_once __DIR__ . './vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);
try {
    $message = $client->message()->send([
        'to' => '353861036746',
        'from' => 'Smishing Vishing Application',
        'text' => 'A text message sent using the Nexmo SMS API'
    ]);
    $response = $message->getResponseData();
    if($response['messages'][0]['status'] == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $response['messages'][0]['status'] . "\n";
    }
} catch (Exception $e) {
    echo "The message was not sent. Error: " . $e->getMessage() . "\n";
}