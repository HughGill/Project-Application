<?php 
// require_once __DIR__ . '/../config.php';
require_once __DIR__ . './vendor/autoload.php';
// Building Blocks
// 1. Make a Phone Call
// 2. Play Text-to-Speech
$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), '4ef7a380-730b-453a-9cdf-bfb7da3e6ba0');
$client = new \Nexmo\Client($keypair);
$call = $client->calls()->create([
    'to' => [[
        'type' => 'phone',
        'number' => '353861036746'
    ]],
    'from' => [
        'type' => 'phone',
        'number' => '447520635645'
    ],
    'answer_url' => ['https://developer.nexmo.com/ncco/tts.json'],
]);
error_log($call);