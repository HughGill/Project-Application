<?php include "./templates/header.php";
    
    
    $ID = $_SESSION['userid'];

	if(!isset($_SESSION["connected"]))
     header("Location: index.php");
    $Direction = "outbound";
    
    $sql = "SELECT * FROM messages WHERE direction='$Direction' AND userid='$ID'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
?>

<h1 class="col-sm-6 offset-sm-3 text-center py-4">Messages</h1>
    <div class="container mt-3">
        <ul class="nav nav-tabs nav-justified" style="position: fixed;padding: 10px;width: 100%">
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "messages.php"){echo "active";}?>">
                <a class="nav-link active" href="messages.php">
                    Sent Messages
                </a>
            </li>
            <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "inbound-messages.php"){echo "active";}?>">
                <a class="nav-link" href="inbound-messages.php">
                    Inbound Messages
                </a>
            </li>
        </ul>
    </div>

                    
                        

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