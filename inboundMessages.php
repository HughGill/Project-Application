<?php include "./templates/header.php";
    
    
    $ID = $_SESSION['userid'];

	if(!isset($_SESSION["connected"]))
     header("Location: index.php");
     require_once __DIR__ . './vendor/autoload.php';

     $basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
     $client = new \Nexmo\Client(new \Nexmo\Client\Credentials\Container($basic));
 
 
     $inbound = \Nexmo\Message\InboundMessage::createFromGlobals();
 
     $From = $inbound['from'];
     $Text = $inbound['text'];
     $Direction = "inbound";
     $sql = "SELECT * FROM messages";
     $result = $mysqli->query($sql);
    
     $urlRegex = ("/(?i)\b((?:https?://|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/");
    
    

     if(!isset($From) || !isset($Text)) { ?>
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            There is no new messages
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

     <?php }
     else{
         if(strcasecmp($Text, $urlRegex) == 0){
            $Text = "Message can't be displayed suspected vishing attempt";
            $sql = "INSERT INTO messages (recipicent, text, direction, userid) VALUES ('$From' , '$Text' , '$Direction', '$ID')";
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
            }
        else{
            
            $sql = "INSERT INTO messages (recipicent, text, direction, userid) VALUES ('$From' , '$Text' , '$Direction', '$ID')";
            $insert = $mysqli->query($sql);
    
            if ( $insert ) { ?>
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    Message received
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }

            }
     }
    
    $sql = "SELECT * FROM messages WHERE direction='$Direction' AND userid='$ID'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
?>

<h1 class="col-sm-6 offset-sm-3 text-center py-4">Messages</h1>                    

<?php while($rows = $result->fetch_assoc()) { ?>
<table class="table table-bordered" style="align-center">
    <tbody class="bg-light">
        <tr>
            <td class="text-left" id="recipicent" name="recipicent"><label id="recipicent" name="recipicent" for="recipicent">Recipicent</label></td>
        </tr>
        <tr>
            <td class="text-left" id="recipicent" name="recipicent"><?php echo $rows["recipicent"]; ?></td> 
        </tr>
        <br>    
        <tr>
            <td class="text-left" id="text" name="text"><label id="text" name="text" for="text">Text</label></td>
        </tr>
        <tr>
            <td class="text-left" id="text" name="text"><?php echo $rows["text"]; ?></td>
        </tr>
        <br>
        <?php }
    } else{?>
            <tr>
                <td><div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                    There is no Messages
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </td></div>
            </tr>
        </tbody>
    </table>
    <?php }

include "./templates/footer.php";
?>