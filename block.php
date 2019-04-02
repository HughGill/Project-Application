<?php 

if(! empty( $_POST )){

    $Number = $_POST['number'];
    $ID = $_SESSION['userid'];

    $sql = "SELECT * FROM blocked WHERE userid='$ID'";
		$result = $mysqli->query($sql);

		if ($result->num_rows == 0)  {
			$sql = "INSERT INTO blocked ( number, userid) VALUES ('$Number', '$ID')";
			$insert = $mysqli->query($sql);
	
			if ( $insert ) { ?>
				<div class="alert alert-success alert-dismissible fade show my-3" role="alert">
					Number Blocked
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
				Error: Number not blocked
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php }
	}
?>