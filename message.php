<?php include "templates/header.php";
	
	if(!isset($_SESSION["connected"]))
     header("Location: index.php");

	if (!empty( $_GET ))
	{
		$Recipicent = $_GET['recipicent'];
		$Text = $_GET['text'];
        $ID = $_SESSION['userid'];

        $sql = "SELECT * from messages WHERE recipicent = '$Recipicent' AND text = '$Text' AND userid = '$ID'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
?>
<h1 class="col-sm-6 offset-sm-3 text-center py-4">Messages</h1>
		<table class="table table-bordered">

            <thead class="thead-dark">
                <tr>
                    <th>Sender</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody class="bg-light">
                <?php while($message = $result->fetch_assoc()) {
                    $ID = $message['userid'];
                    $sql = "SELECT recipicent, text FROM messages, users
                            WHERE messages.userid = users.id";

                    $customer = $mysqli->query($sql)->fetch_assoc();
                    ?>
                    <tr>
                        <td class="text-right"><?php echo $message["recipicent"];?></td>
                        <td class="text-right">€<?php echo $message["text"];?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="alert alert-dark fade show my-3" role="alert">
            You don't have any Messages
        </div>
    <?php }
	}

include "templates/footer.php";
?>