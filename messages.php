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