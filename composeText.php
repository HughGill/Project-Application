<?php include "templates/header.php";
    
    if(!isset($_SESSION["connected"]))
    header("Location: index.php");

    $ID = $_SESSION['userid']
?>

<div id="container" name="createText">
    <form action="composeText.php" method="POST" class="form-horizontal col-sm-6 offset-sm-3">
    <h1 class="col-sm-6 offset-sm-3 text-center py-4">Message</h1>
        <div class="form-group">
            <span class="input-group-addon" for="recipicent"><label for="recipicent">To:</label></span>
            <input type="text" class="form-control" id="recipicent" name="recipicent">
        </div>
        <div class="form-group">
            <span class="input-group-addon" for="text"><label for="text">Text:</label></span>
            <input type="text" class="form-control" id="text" name="text">
        </div>
        <button type="submit" class="btn" style="background-color: white; color: orange"><i class="fas fa-paper-plane"></i></button>
    </form>
</div>


<?php
if (! empty( $_POST ) ) {
    require_once __DIR__ . './vendor/autoload.php';

    $Name = $_POST['recipicent'];
    $Text = $_POST['text'];


    //Nexmo Variables
    $basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
    $client = new \Nexmo\Client($basic);

    $sql = "SELECT * FROM messages WHERE userid='$ID'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0)  {
        $sql = "INSERT INTO messages (recipicent, text, userid) VALUES ('$Name' , '$Text' , '$ID')";
        $insert = $mysqli->query($sql);
        
        try {
            $message = $client->message()->send([
                'to' => $Name,
                'from' => 'Application',
                'text' => $Text
            ]);
            $response = $message->getResponseData();
            if($response['messages'][0]['status'] == 0) {
                echo "The message was sent successfully\n";
            } else {
                echo "The message failed with status: " . $response['messages'][0]['status'] . "\n";
            }
        } catch (Exception $e) {
            echo "The message was not sent. Error: " . $e->getMessage() . "\n";
        }

        if ( $insert ) { ?>
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                Message Sent
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        else {
            die("Error: {$mysqli->errno} : {mysqli->error}");
        }
    } else { ?>
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            Error : Message wasn't sent
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }
	}
?>
    
<?php include "templates/footer.php"
?>