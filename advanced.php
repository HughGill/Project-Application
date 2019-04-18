<?php
require_once __DIR__ . '/vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);

$call = new \Nexmo\Call\Call();

$number = $call->getFrom();

$insights = $client->insights()->advanced(INSIGHT_NUMBER);
switch($insights->getReachable()) {
    case 'reachable':
        $reachableStatus = 'is reachable';
        break;
    case 'unknown':
        $reachableStatus = 'may be reachable';
        break;
    default:
        $reachableStatus = 'could not be queried';
}
if($insights->getNationalFormatNumber() != 353){
    echo "Thiss caller isn't calling from ireland. this may be a vishing scam";
}