<?php include "templates/header.php"
?>

<div class="" id="container" name="">
    <form class="" id="incoming-call" name="incoming-call" method="" action="">
        <div class="" id="incomingNumber" name="incomingNumber">
            <label class="" id="number" name="number"></label>
        </div>
        <div class="" id="accept" name="accept" style="text-align:center;padding-top:50px">
            <button type="" class="" id="accept" name="accept" style="color:green; border-radius:50%"><i class="fas fa-phone"></i></button>
        </div>
        <div class="" id="" name="">
            <button type="" class="" id="reject" name="reject" style="color:red;border-radius:50%"><i class="fas fa-phone"></i></button>
        </div>
    </form>
</div>


<?php
    require __DIR__ . '/vendor/autoload.php';
    use Twilio\TwiML;

    // Start our TwiML response
    $response = new TwiML;

    // Read a message aloud to the caller
    $response->say(
        "Thank you for calling! Have a great day.", 
        array("voice" => "alice")
    );

    echo $response;
?>



<?php include "templates/footer.php"
?>