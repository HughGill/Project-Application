<?php include "templates/header.php";
	if(!isset($_SESSION["connected"]))
	header('Location: settings.php');
?>


<h1 class="col-sm-6 offset-sm-3 text-center py-4">Settings</h1>
<div class="modal-dialog modal-lg modal-dialog-centered">	
	<div class="nav nav-tabs nav-stacked" style="width:device-width">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a href="profile.php" data-toggle="tab" style="color:black">Profile   <i class="fas fa-user"></i></a>
			</li>
		
			<li>
				<a href="logout.php" data-toggle="tab" style="color:black">Logout    <i class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	</div>
<div>
		
		
<?php include "templates/footer.php"
?>