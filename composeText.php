<?php include "templates/header.php"
?>


<div id="container" name="" class="">
    <form action="composeText.php" method="POST">
        <div class="form-group">
            <label for="recipicent">To:</label>
            <input type="text" class="form-control" id="recipicent" name="recipicent">
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <input type="text" class="form-control" id="text" name="text">
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<?php 
require __DIR__ . '/vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);
$Recipicent = $_POST['recipicent'];
$Text = $_POST['text'];

$message = $client->message()->send([
    'to' => '353861036746',
    'from' => 'Nexmo',
    'text' => 'Hello from Nexmo'
]);
?>

<?php
if (! empty( $_POST ) ) {
    $Name = $_POST['recipicent'];
    $Text = $_POST['text'];
    

    $sql = "SELECT * FROM messages WHERE username='$Username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0)  {
        $sql = "INSERT INTO messages (recipicent, text) VALUES ('$Name' , '$Text')";
        $insert = $mysqli->query($sql);

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