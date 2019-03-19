<?php include "templates/header.php";

	if(isset($_SESSION["connected"]))
		header('Location: index.php');
?>


<div class="container">
		<form action="login.php" method="post" class="form-horizontal col-sm-4 offset-sm-3">
			<h1>Login</h1>
			<div class="form-group">
				<i style='font-size:24px' class='fas' aria-hidden="true" for="username">&#xf007;</i>
				<input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
			</div>
			<div class="form-group">
				<p><i style='font-size:24px' class='fas' aria-hidden="true" for="password">&#xf023;</i>
				<input type="password" class="form-control" id="password" placeholder="Password" name="password" required></p>
			</div>
				<button type="submit" class="btn btn-primary">Login</button>
				<a href="register.html"><button id="register" name="register" class="btn btn-default">Register</button></a>
		</form>
</div>


<?php
	if (! empty( $_POST ) )
	{
		$Username = $_POST['username'];
		$Password = $_POST['password'];

		$sql = "SELECT * FROM users WHERE username='$Username' AND password='$Password'";
		$select = $mysqli->query($sql);

		if ( $select->num_rows > 0 && verify_if($Password, $Hash)) {
			$row = $select->fetch_assoc();
			$_SESSION['connected'] = true;
			$_SESSION['username'] = $Username;
			$_SESSION['userid'] = $row["id"];
			header('Location: phone.php');
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
