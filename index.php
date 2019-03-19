<?php include "templates/header.php";?>

<h1 class="col-sm-12 text-center py-4" style="margin-top: 15%">Application Name</h1>
<?php 
if(isset($_SESSION["connected"]) && $_SESSION["connected"]) { ?>
    <a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="phone.php" role="button">Proceed to Application Interfaces</a>    
<?php } 
else { ?>
    <a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="register.php" role="button">Sign up</a>
<?php }
	
 include "templates/footer.php";?>