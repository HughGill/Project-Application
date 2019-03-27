<?php session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = '4thyearprojectappdb';

    $mysqli = new mysqli($host , $user, $pass , $db);

    if ( $mysqli->connect_error) {
    	die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Page Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="device" href="style/app.css" />

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-migrate-3.0.1.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
</head>
<body>
	
<header>

<ul class="nav nav-tabs nav-justified">
				<?php if(isset($_SESSION['connected']) && $_SESSION['connected']) { 
							if(basename($_SERVER['PHP_SELF']) == "phone.php")  { ?>
						<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "contacts.php"){echo "active";}?>">
							<a class="nav-link active" href="contacts.php">Contacts
								<i class="fas fa-address-book"></i>
							</a>
						</li>
						<li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "log.php"){echo "active";}?>">
							<a class="nav-link" href="log.php">Call Log
								<i class="fas fa-list-ul"></i>
							</a>
						</li>
          <?php }
        }?>

          <?php if(isset($_SESSION['connected']) && $_SESSION['connected']) { 
							if(basename($_SERVER['PHP_SELF']) == "message.php")  { ?>
              <li class="nav-item">
                <a class="nav-link active" href="composeText.php">
                  <button style="background-color: orange; color: white">Compose Text Message
                    <i class="fas fa-pencil-alt"></i>
                  </button>
                </a>
              </li>
              <?php }
          }?>
          <?php if(isset($_SESSION['connected']) && $_SESSION['connected']) { 
							if(basename($_SERVER['PHP_SELF']) == "contacts.php")  { ?>
              <li class="nav-item" style="right: 0;">
                <a class="nav-link active" href="createContact.php">
                  <button style="background-color: blue; color: white">Add contact
                    <i class="fas fa-user-plus"></i>
                  </button>
                </a>
              </li>
              <?php }
          }?>
      </ul>
</header>


<main class="container" style="padding-top:50px>