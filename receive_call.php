<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '/vendor/autoload.php';

$app = new \Slim\App;

$app->get('/webhooks/answer', function (Request $request, Response $response) {
    $ncco = [
        [
            'action' => 'connect',
            'endpoint' => [
                [
                    'type' => 'phone',
                    'number' => '12015913502'
                ]
            ]
        ]
    ];
    return $response->withJson($ncco);
});
$app->run();
