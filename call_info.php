<?php

require_once __DIR__ . '/vendor/autoload.php';

$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
$client = new \Nexmo\Client($keypair);

$call = $client->calls()->get('182fb799-29d0-4628-9492-edd9ef5e2ef7');
echo json_encode($call).PHP_EOL;