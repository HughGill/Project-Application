<?php
require_once __DIR__ . '/vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);

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
echo "The number ".$insights->getNationalFormatNumber()." ". $reachableStatus;