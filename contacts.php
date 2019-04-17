<?php include "templates/header.php"; 
    if(!isset($_SESSION["connected"]))
    header('Location: index.php');
    
    $ID = $_SESSION['userid'];

    $sql = "SELECT * from contacts WHERE userid = '$ID'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {

?>
    <h1 class="col-sm-6 offset-sm-3 text-center py-4">Contacts</h1>
    <?php while($row = $result->fetch_assoc()) { ?>

        
        <table class="table table-bordered">
            <tbody class="bg-light">
            <tr>
                <th>Name</th>
            </tr>
            <tr>
                <td class="text-right"><?php echo $row["name"];?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
            </tr>
            <tr>
                <td class="text-right"><?php echo $row["phoneNo"];?></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
            </tr>
            <tr>
                <td class="text-right"><?php echo $row["mobileNo"];?></td>
            </tr>
        <?php } 
        
            
    } 
    else { ?>
        <tr>
            <td><div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                There is no Contacts
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </td></div>
        </tr>
    </tbody>
</table>
<?php } 
    
    
include "templates/footer.php"
?>