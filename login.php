<?php include "templates/header.php";

	if(isset($_SESSION["connected"]))
		header('Location: index.php');
?>
<h1>Login</h1>
<div class="container">
	<form action="login.php" method="post" class="form-horizontal col-sm-6 offset-sm-3">
	<h1>Login</h1>
		<div class="input-group" style="padding: 8px">
			<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			<input id="username" type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="input-group"style="padding: 8px">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			<input id="loginpassword" type="password" class="form-control" name="loginpassword" placeholder="Password">
		</div>
			<button type="submit" class="btn btn-primary">Login</button>
	</form>
</div>


<?php
	if (! empty( $_POST ) )
	{
		$Username = $_POST['username'];
		$Password = $_POST['loginpassword'];
		//$Hash = $_GET['password'];
		//$VerifyPassword = verify_if($Password, $Hash);

		$sql = "SELECT * FROM users WHERE username='$Username' AND password='$Password'";
		$select = $mysqli->query($sql);


		//$VerifyPassword==true;


		if( $select->num_rows > 0 ) {?>
			<div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
				Invalid Password
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }

		if ( $select->num_rows > 0 ) {
			$row = $select->fetch_assoc();
			$_SESSION['connected'] = true;
			$_SESSION['username'] = $Username;
			$_SESSION['userid'] = $row['id'];
			header('Location: index.php');
		} else { ?>
			<div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
				Error : Wrong user name or password
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }
	}
?>	
	
<?php include "templates/footer.php"
?>
