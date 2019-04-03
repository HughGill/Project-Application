<?php 
require_once __DIR__ . './vendor/autoload.php';
// Building Blocks
// 1. Make a Phone Call
// 2. Play Text-to-Speech
$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
$client = new \Nexmo\Client($keypair);
try{
    $call = $client->calls()->create([
        'to' => [[
            'type' => 'phone',
            'number' => '353861036746'
        ]],
        'from' => [
            'type' => 'phone',
            'number' => '12046743488'
        ],
        'answer_url' => ['https://developer.nexmo.com/ncco/tts.json'],
    ]);
error_log(''+ (int)$call);
}
catch (Exception $e){
    echo "The call couldn't be made. Error: " . $e->getMessage() . "\n";    
}


