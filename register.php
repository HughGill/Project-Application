<?php include "templates/header.php";
    if(isset($_SESSION["connected"]))
    header('Location: index.php');
?>
    <div class="container">
        <form action="register.php" method="post" id="#identicalForm" class="form-horizontal col-sm-6 offset-sm-3" data-bv-feedbackicons-valid="glyphicon glyphicon-ok" data-bv-feedbackicons-invalid="glyphicon glyphicon-remove" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
        <h1>Register</h1>
        <p id="mandatory_fields" class="p" style="color: red; font-size: 10px">* All Fields are mandatory</p>
            <div class="form-group row">
                <input type="text" class="form-control" id="firstName" placeholder="Enter First name" name="firstName" required >
            </div>
            <div class="form-group row">
                <input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname" required>
            </div>
            <div class="form-group row">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group row">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-group row" id="password">
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required data-bv-identical="true" data-bv-identical-field="confirmPassword" data-bv-identical-message="The passwords are not the same" >
            </div>
            <div class="form-group row" id="password">
                <input type="password" class="form-control" id="cpassword" Placeholder="Confirm Password" name="cpassword" required data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="The passwords are not the same" >      
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Register</button>
            
            <div id="login_container" style="padding-top:30px;">
            <ul>
                <li>
                    <a href="login.php">Already a member login</a>
                </li>
            </ul>
        </div>
        </form>
        
	</div>
    
<?php

    

if (! empty( $_POST )  && $_POST['password'] == $_POST['cpassword']) {
    $Firstname = mysqli_real_escape_string($mysqli, $_POST['firstName']);
    $Lastname = mysqli_real_escape_string($mysqli, $_POST['surname']);
    $Email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $Username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $Password = mysqli_real_escape_string($mysqli, $_POST['password']);
    
    $Hash = password_hash($Password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE username='$Username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows == 0)  {
            $sql = "INSERT INTO users ( firstName, lastName, email, username, password) VALUES ('$Firstname' , '$Lastname', '$Email' , '$Username' , '$Hash')";
            $insert = $mysqli->query($sql);

            if ( $insert ) { ?>
                <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
                    You have registered successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
            <?php }
            else {
                die("Error: {$mysqli->errno} : {mysqli->error}");
            }
        } 
        else { ?>
            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                Error : This username is already taken
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
        }
?>

<?php include "templates/footer.php"
?>