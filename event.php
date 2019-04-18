<?php include "./templates/header.php";
require_once __DIR__ . './vendor/autoload.php';

$Call = new \Nexmo\Call\Call();

?>

<table>
    <thead>
        <tr>
            <th><label><?php echo $Call->getStatus(); ?></label></th>
        </tr>
        <tr>
            <th><label class="label" id="number" name="number"><?php $Call->getFrom(); ?></label></th>
        </tr>
    </thead>
        <tbody>
            <td>
                <form method="post" action="answer.php">
                    <button type="submit" class="btn btn-success btn-lg" id="accept" name="accept" style="color:green; border-radius:50%"><i class="fas fa-phone"></i></button>
                </form>
            </td>
            <td>
                <form method="post" action="\vendor\Nexmo\Client\Call\Hangup.php">
                    <button type="submit"class="btn btn-danger btn-lg" id="reject" name="reject" style="color:red;border-radius:50%" call.reject()><i class="fas fa-phone"></i></button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

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
                    alert("Warning! this caller isn't from calling outside of Ireland");
                }
            });
        });
    }
}

</script>


<?php include "./templates/footer.php"
?>