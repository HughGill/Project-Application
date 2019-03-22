<?php include "templates/header.php";
	
	if(!isset($_SESSION["connected"]))
     header("Location: message.php");

	if (!empty( $_GET ))
	{
		$Recipicent = $_GET['recipicent'];
		$Text = $_GET['text'];
        $Id = $_GET['userid'];

        $sql = "SELECT * from messages WHERE recipicent = '$Recipicent' AND text = '$Model' AND userid = '$Id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
			$message = $result->fetch_assoc();
?>

<div class="modal-dialog modal-lg modal-dialog-centered">
    <div id="container" name="" class=""> 
        <div for="header">
            <a href="composeText.php"><button type="button" class="btn btn-warning" >Compose Message</button></a>
        </div>
		<div id="container">
			<form action="message.php" method="GET">
				<div id="name" name="name" class="">
					<label id="name" name="name" class="">Name:</label>
				</div>
				<div id="text" name="text" class="">
					<label id="text" name="text" class="">Text:</label>
				</div>
			</form>
		</div>
	</div>

	<script>
		function urlify(text) {
			var urlRegex = /(((https?:\/\/)|(www\.))[^\s]+)/g;
			//var urlRegex = /(https?:\/\/[^\s]+)/g;
			return text.replace(urlRegex, function(url,b,c) {
				var url2 = (c == 'www.') ?  'http://' +url : url;
				return '<a href="' +url2+ '" target="_blank">' + url + '</a>';
			}) 
		}
	</script>

</div>
	<?php }  
	else { ?>
		<div class="alert alert-dark fade show my-3" role="alert">
			There is no messages!
		</div>
		}
	<?php } 
	}

include "templates/footer.php";
?>