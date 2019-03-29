<?php 
// require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../vendor/autoload.php';
// Building Blocks
// 1. Make a Phone Call
// 2. Play Text-to-Speech
$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents(NEXMO_APPLICATION_PRIVATE_KEY_PATH), '1174559e-c7c8-4017-916c-08bd0dfe8fff');
$client = new \Nexmo\Client($keypair);
$call = $client->calls()->create([
    'to' => [[
        'type' => 'phone',
        'number' => '353861036746'
    ]],
    'from' => [
        'type' => 'phone',
        'number' => 'Smishing Vishing Application'
    ],
    'answer_url' => ['https://developer.nexmo.com/ncco/tts.json'],
]);
error_log($call);