<?php include "templates/header.php";
		if(!isset($_SESSION["connected"]))
		header("Location: index.php");

		$ID = $_SESSION['userid'];
?>
<h1 class="col-sm-6 offset-sm-3 text-center py-4">Create Contact</h1>
<div class="container">
  <form action="createContact.php" method="POST" class="form-horizontal col-sm-6 offset-sm-3">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
      </div>
      <div class="form-group">
          <label for="mobileNumber">Mobile Number:</label>
          <input type="text" class="form-control" id="mobileNumber" name="mobileNumber">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
<?php
	if (! empty( $_POST ) ) {
		$Name = $_POST['name'];
		$Phone = $_POST['phoneNumber'];
		$Mobile = $_POST['mobileNumber'];

		$sql = "SELECT * FROM contacts WHERE userid='$ID'";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0)  {
			$sql = "INSERT INTO contacts ( name, phoneNo, mobileNo, userid) VALUES ('$Name' , '$Phone', '$Mobile', '$ID')";
			$insert = $mysqli->query($sql);
	
			if ( $insert ) { ?>
				<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
					Contact created
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php }
			else {
				die("Error: {$mysqli->errno} : {mysqli->error}");
			}
		} else { ?>
			<div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
				Error: Contact not created
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }
	}
?>

<?php include "templates/footer.php"
?>
