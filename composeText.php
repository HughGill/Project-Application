<?php include "templates/header.php";
    
    if(!isset($_SESSION["connected"]))
    header("Location: index.php");
?>
<h1 class="col-sm-6 offset-sm-3 text-center py-4">Create Message</h1>

<div id="container" name="createText">
    <form action="composeText.php" method="POST" class="form-horizontal col-sm-6 offset-sm-3">
        <div class="form-group">
            <label for="recipicent">To:</label>
            <input type="text" class="form-control" id="recipicent" name="recipicent">
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <input type="text" class="form-control" id="text" name="text">
        </div>
        <button type="submit" class="btn" style="background-color: white; color: orange"><i class="fas fa-paper-plane"></i></button>
    </form>
</div>

<!-- <?php 
require __DIR__ . '/vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);
$Recipicent = $_POST['recipicent'];
$Text = $_POST['text'];

$message = $client->message()->send([
    'to' => '$Recipicent',
    'from' => 'Smishing Vishing Application',
    'text' => '$Text'
]);
?> -->

<?php
if (! empty( $_POST ) ) {
    $Name = $_POST['recipicent'];
    $Text = $_POST['text'];
    $ID = $_GET['userid'];

    $sql = "SELECT * FROM messages WHERE username='$Username'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 0)  {
        $sql = "INSERT INTO messages (recipicent, text, userid) VALUES ('$Name' , '$Text' , '$ID')";
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