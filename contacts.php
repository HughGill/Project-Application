<?php include "templates/header.php"; 
    if(!isset($_SESSION["connected"]))
    header('Location: contacts.php');
    
    if (!empty( $_GET )) 
    {
		$Name = $_GET['name'];
		$PhoneNumber = $_GET['phoneNo'];
        $MobileNumber = $_GET['mobileNo'];
        $Id = $_GET['userid'];
        
        $sql = "SELECT * from contacts WHERE name = '$Name' AND phoneNo = '$PhoneNumber' AND MobileNo = '$MobileNumber' AND userid = '$Id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $contact = $result->fetch_assoc();

?>
        <div id="container" name="" class="">
            <div id="" name="" class="">
                <a href="createContact.html"><button type="button" class="btn btn-primary"><i class="fas fa-user-plus"></i></button></a>
            </div>
            <div id="container" name="" class=""> 
                <form method="GET" action="contacts.php">
                    <div id="contactName" name="contactName" class="">
                        <label id="name" name="name" class="control-label col-sm-3 text-dark">Name: </label>
                    </div>
                    <div id="contactNumber" name="contactNumber" class="">
                        <label id="" name="" class="control-label col-sm-3 text-dark">Number: </label>
                    </div>
                </form>
            </div>
        </div>
        <?php 
    }
    else{ ?>
        <div class="alert alert-dark fade show my-3" role="alert">
            There is no Contacts!
        </div>
        <?php }
    }
    
include "templates/footer.php"
?>