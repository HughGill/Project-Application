<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require '/vendor/autoload.php';
    $app = new \Slim\App;
    $app->get('https://2e0085ff.ngrok.io/webhooks/answer', function (Request $request, Response $response) {
        $params = $request->getQueryParams();
        $fromSplitIntoCharacters = implode(" ", str_split($params['from']));
    
        $ncco = [
            [
                'action' => 'talk',
                'text' => 'Thank you for calling from '.$fromSplitIntoCharacters
            ]
        ];
    
        return $response->withJson($ncco);
    });
    
$app->run();

