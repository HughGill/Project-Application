<?php include "templates/header.php";
	
	if(!isset($_SESSION["connected"]))
	header('Location: blocked.php');

	$Id = $_GET['userid'];

	if (!empty( $_GET )) 
    {
		$Number = $_GET['number'];

        $sql = "SELECT * from blocked WHERE number = '$Name' userid = '$Id'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            $blocked = $result->fetch_assoc();
?>

    <div id="container" class="modal-dialog modal-lg modal-dialog-centered">
        <form method="Get" action="blocked.php">
            <div id="container">
                <div>
                    <label>Number:	</label>
                </div>
            </div>
        </form>  
	</div>
	<?php }
	else { ?>
			<div class="alert alert-dark fade show my-3" role="alert">There is no blocked Numbers! </div>
		<?php }
	}

include "templates/footer.php"
?>