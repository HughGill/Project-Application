<?php include "templates/header.php"
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
                    alert("Warning! this caller isn't calling outside of Ireland");
                }
            });
        });
    }
}

</script>

<?php include "templates/footer.php"
?>