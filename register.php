<?php include "templates/header.php";
    if(isset($_SESSION["connected"]))
    header('Location: index.php');
?>
  <title>Registration</title>
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
            <button type="submit" class="btn btn-primary">Register</button>
            
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
if (! empty( $_POST ) ) {
    $Firstname = $_POST['firstName'];
    $Lastname = $_POST['surname'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Password = test_input($_POST['password']);
    $CPassword = test_input($_POST['cpassword']);;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(!empty($Password && ($Password == $CPassword)))
            {
                if (strlen($_POST["password"]) < 8) {?>
                    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                        Your Password Must Contain At Least 8 Characters!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } 
                else if(!preg_match("#[0-9]+#", $Password)) { ?>
                    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                        Your Password Must Contain At Least 1 Number!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                else if(!preg_match("#[A-Z]+#", $Password)) {?>

                    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                        $error="Your Password Must Contain At Least 1 Capital Letter!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                else if(!preg_match("#[a-z]+#", $Password)) {?>
                    <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                        Your Password Must Contain At Least 1 Lowercase Letter!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } 
            }
            else if(!empty($_POST["password"])) {?>
            <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                Please Check You've Entered Or Confirmed Your Password!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }
            else {?>
            <div class="alert alert-warning alert-dismissible fade show my-3" role="alert">
                Please enter password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php }
    }


        //$Hash = password_hash($Password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE username='$Username'";
        $result = $mysqli->query($sql);

        if ($result->num_rows == 0 && !empty($Password) && $Password==$CPassword)  {
            $sql = "INSERT INTO users ( firstName, lastName, email, username, password) VALUES ('$Firstname' , '$Lastname', '$Email' , '$Username' , '$Password')";
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

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php include "templates/footer.php"
?>