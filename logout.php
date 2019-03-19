<?php include "templates/header.php";


unset($_SESSION['connected']);
unset($_SESSION['username']);
unset($_SESSION['id']);
header('Location: index.php');

include "templates/footer.php"
?>