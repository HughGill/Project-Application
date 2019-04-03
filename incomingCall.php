<?php include "templates/header.php";


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
?>

<div class="" id="container" name="">
        <div class="" id="incomingNumber" name="incomingNumber">
            <label class="" id="number" name="number"></label>
        </div>
    <form class="" id="incoming-call" name="incoming-call" method="get" action="">
        <div class="" id="accept" name="accept" style="text-align:center;padding-top:50px">
            <button class="btn btn-success btn-lg" id="accept" name="accept" style="color:green; border-radius:50%"><i class="fas fa-phone"></i></button>
        </div>
    </form>
    <form method="post" action="">
        <div class="" id="" name="">
            <button class="btn btn-danger btn-lg" id="reject" name="reject" style="color:red;border-radius:50%"><i class="fas fa-phone"></i></button>
        </div>
    </form>
</div>

<script>
    function callChecker() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            $.getJSON('http://ws.geonames.org/countryCode', {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                type: 'JSON'
            }, function (result) {
                if (result.countryName != 'IRELAND') {
                    alert("Warning! this caller is from calling outside of Ireland");
                }
            });
        });
    }
}

</script>

<?php include "templates/footer.php"
?>