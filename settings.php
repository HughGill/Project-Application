<?php include "templates/header.php";
	if(!isset($_SESSION["connected"]))
	header('Location: settings.php');
?>

<title>Settings</title>
<div class="modal-dialog modal-lg modal-dialog-centered" id="tabcontent">	
	<div style="width:device-width">
	<table class="table">
		<thead>
			<tr>
				<h1 class="col-sm-6 offset-sm-3 text-center py-4">Settings</h1>
			</tr>
		</thead>
		<tbody>
			<ul class="nav nav-pills nav-stacked">
				<tr>
					<td>
						<li>
							<a href="profile.php" style="color:black">Profile   <i class="fas fa-user"></i></a>
						</li>
					</td>
				</tr>
				<tr>
					<td>
						<li>
							<a href="logout.php" style="color:black">Logout    <i class="fas fa-sign-out-alt"></i></a>
						</li>
					</td>
				</tr>
			</ul>
		</table>
	</div>
<div>
		
		
<?php include "templates/footer.php"
?>