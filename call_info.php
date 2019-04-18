<?php

require_once __DIR__ . '/vendor/autoload.php';



$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
$client = new \Nexmo\Client($keypair);


$filter = new \Nexmo\Call\Filter();
$filter->setStatus('completed');

foreach($client->calls($filter) as $call){
    if($call->getDirection() == "inbound"){
        echo "From: " . $call->getFrom();
    }
    else{
        echo "To" . $call->getFrom();
    }
}