<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . './vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);

$app = new \Slim\App;

// Retrive the inbound call details
$from = $_GET['from'];
$to = $_GET['to'];

$insights = $client->insights()->advanced($from);
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
    echo "This caller isnt calling from Ireland, This may be a vishing attempt";
}

// Create the `connect` NCCO
$app->get('https://d719338e.ngrok.io/answer', function (Request $request, Response $response) {    
    $params = $request->getQueryParams();
    $fromSplitIntoCharacters = implode(" ", str_split($params['from']));
    $ncco = [
        [
            'action' => 'talk',
            'text' => 'Thank you for calling from '. $fromSplitIntoCharacters
        ]
    ];
    return $response->withJson($ncco);
});
    
$app->run();


header('Content-Type: application/json');
$json = json_encode($ncco);
echo($json);