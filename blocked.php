<?php include "templates/header.php";
	
	if(!isset($_SESSION["connected"]))
	header('Location: index.php');

    $ID = $_SESSION['userid'];
    
    $sql = "SELECT * from blocked
            WHERE userid= '$ID'";
            
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
?>

<h1 class="col-sm-6 offset-sm-3 text-center py-4">Blocked Numbers</h1>
    <?php while($row = $result->fetch_assoc()) { ?>
        <table class="table table-bordered">
            <tbody class="bg-light">
            <tr>
                <th>Number</th>
            </tr>
            <tr>
                <th><?php echo $row['number']; ?></th>
            </tr>

    <?php }   
} else {?>
        <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
            There is no blocked Numbers
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php }

include "templates/footer.php"
?>