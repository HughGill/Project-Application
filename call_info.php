<?php

require_once __DIR__ . '/vendor/autoload.php';

$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
$client = new \Nexmo\Client($keypair);

$filter = new \Nexmo\Call\Filter();
$filter->setStart(new DateTime('- 1 day'));
$filter->setEnd(new DateTime);

foreach ($client->calls($filter) as $call){
    echo json_encode($call).PHP_EOL;
}