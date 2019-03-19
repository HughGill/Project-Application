<?php include "templates/header.php";
	
	if(!isset($_GET["id"]))
     header("Location: message.php");

	if (!empty( $_GET ))
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = '4thyearprojectappdb';

		$mysqli = new mysqli($host , $user, $pass , $db);

		if ( $mysqli->connect_error) {
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
		}
        
        $ID = $_GET['id'];
        $sqlMessage = "SELECT * from messages WHERE id=$ID";
        $resultMessage = $mysqli->query($sqlMesssage);

        if ($resulMessage->num_rows > 0 ) {
			$Text = $resultMessage->fetch_assoc();?>

<div class="modal-dialog modal-lg modal-dialog-centered">
    <div id="container" name="" class=""> 
        <div for="header">
            <a href="composeText.php"><button type="button" class="btn btn-warning" >Compose Message</button></a>
        </div>

        <form action="message.php" method="GET">
            <div id="name" name="name" class="">
                <label id="name" name="name" class="">Name:</label>
            </div>
            <div id="text" name="text" class="">
                <label id="text" name="text" class="">Text:</label>
            </div>

		</form>
		} else{
			
		}

        <div id="nav-container">
			<ul class="nav nav-tabs nav-justified">
				<li>
					<a href="phone.php" style="color:black">
						<button class="tablinks">
							<i class="fas fa-phone"></i>
						</button>
					</a>
				</li>
				<li class="active">
					<a href="#" style="color:black">
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
				<li>
					<a href="settings.php" style="color:black">
						<button class="tablinks">
							<i class="fas fa-cog"></i>
						</button>
					</a>
				</li>
			</ul>
		</div>		
    </div>
</div>

<?php include "templates/footer.php";
?>