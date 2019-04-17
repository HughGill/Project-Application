<?php include ".templates/header.php";

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
if($insights->getNationalFormatNumber() != 353){
    echo "This caller isnt calling from Ireland, This may be a vishing attempt";
}


?>

<div class="" id="container" name="">

        <label><?php echo "status";?></label>
        <div class="" id="incomingNumber" name="incomingNumber" style="padding: 10px">
            <label class="" id="number" name="number"><?php echo "from";?></label>
        </div>
    <form method="get" action="answer.php">
        <div class="" id="accept" name="accept" style="text-align:center;padding-top:50px">
            <button type="submit" class="btn btn-success btn-lg" id="accept" name="accept" style="color:green; border-radius:50%"><i class="fas fa-phone"></i></button>
        </div>
    </form>
    <form method="post" action="call.reject()">
        <div class="" id="" name="">
            <button type="submit"class="btn btn-danger btn-lg" id="reject" name="reject" style="color:red;border-radius:50%" call.reject()><i class="fas fa-phone"></i></button>
        </div>
    </form>
</div>

<script type="text/javascript">
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


<?php include "./templates/footer.php"
?>