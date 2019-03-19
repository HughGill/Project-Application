<?php include "templates/header.php";
	if(!isset($_SESSION["connected"]))
	header('Location: settings.php');
?>



<div class="modal-dialog modal-lg modal-dialog-centered">	
	<div id="container">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a href="profile.php" style="color:black">Profile   <i class="fas fa-user"></i></a>
			</li>
		
			<li>
				<a href="logout.php" style="color:black">Logout    <i class="fas fa-sign-out-alt"></i></a>
			</li>
		</ul>
	</div>
	<div id="nav-container">
		<ul class="nav nav-tabs nav-justified">
			<li>
				<a href="phone.php" style="color:black">
					<button class="tablinks">
						<i class="fas fa-phone"></i>
					</button>
				</a>
			</li>
			<li>
				<a href="message.php" style="color:black">
					<button class="tablinks">
						<i class="fas fa-envelope"></i>
					</button>
				</a>
			</li>
			<li>
				<a href="blocked.php" style="color:black">
					<button>
						<i class="fas fa-ban"></i>
					</button>
				</a>
			</li>
			<li class="active">
				<a href="#" style="color:black">
					<button class="tablinks">
						<i class="fas fa-cog"></i>
					</button>
				</a>
			</li>
		</ul>
	</div>	
<div>
		
		
<?php include "templates/footer.php"
?>