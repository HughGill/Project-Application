<?php include "templates/header.php"; 
    if(!isset($_SESSION["connected"]))
    header('Location: index.php');
    
    if (!empty( $_GET )) 
    {
		$Name = $_GET['name'];
		$PhoneNumber = $_GET['phoneNo'];
        $MobileNumber = $_GET['mobileNo'];
        $ID = $_SESSION['userid'];
        
        $sql = "SELECT * from contacts WHERE userid = '$ID'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {

?>
        <h1 class="col-sm-6 offset-sm-3 text-center py-4">Contacts</h1>
		<table class="table table-bordered">
			
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Mobile Number</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php while($contacts = $result->fetch_assoc()) {
                    $ID = $contacts['userid'];
                    $sql = "SELECT * FROM users,
                            WHERE messages.userid = $ID";

                    $customer = $mysqli->query($sql)->fetch_assoc();
                    ?>
                    <tr>
                        <td class="text-right"><?php echo $contacts["name"];?></td>
                        <td class="text-right">€<?php echo $contacts["phoneNo"];?></td>
                        <td class="text-right">€<?php echo $contacts["MobileNo"];?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-dark fade show my-3" role="alert">
            You don't have any Contacts
        </div>
    <?php }
	}
    
include "templates/footer.php"
?>