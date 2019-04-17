<?php include "/templates/header.php";
    
    if(!isset($_SESSION["connected"]) || isset($_SESSION["connected"]))
    header("Location: index.php");

    $ID = $_SESSION['userid'];

    require_once __DIR__ . '/vendor/autoload.php';
        

    $basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
    $client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Container($basic));


    $inbound = \Nexmo\Message\InboundMessage::createFromGlobals();

    $from = $inbound->getFrom();
    $text = $inbound->getBody();
    $Direction = "inbound";

    $sql = "SELECT * FROM messages WHERE userid='$ID'";
    $result = $mysqli->query($sql);

    if ($inbound->isValid())  {
        $sql = "INSERT INTO messages (recipicent, text, direction, userid) VALUES ('$from' , '$text' , '$Direction' , '$ID')";
        $insert = $mysqli->query($sql);

        if ( $insert ) { ?>
            <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                Message received
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
            Error : Message wasn't received
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php }


?>
   
<?php include "/templates/footer.php";?>