<?php include "templates/header.php";

if(!isset($_GET["id"]))
     header("Location: profile.php");

     $ID = $_GET["id"];

    if(!empty($_POST) && $ID == $_SESSION["id"]) {
        $Firstname = $_POST["firstName"];
        $Lastname = $_POST["lastName"];
        $Email = $_POST["email"];
        $Username = $_POST["username"];
        $Password = $_POST["address"];
        

        $sql = "UPDATE users
                SET firstName = '$FirstName', lastName = '$Lastname', email = '$Email', username = '$Username', password = '$Address'
                WHERE id = $ID";
        $update = $mysqli->query($sql);

        if($update) {
            $success = true;
        } else {
            $success = false;
        }
    }

    $sql = "SELECT * FROM users WHERE id = $ID";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        header("Location: index.php");
    }
?>

<h1 class="col-sm-6 offset-sm-3 text-center py-4">Profile</h1>

<div class="col-sm-8 offset-sm-2">
    <div class="card my-3 border-dark">
        <div class="card-header bg-dark text-light">
            <h2><?php echo $user["firstName"]; ?></h2>
        </div>
        <div class="card-body col-sm-9 offset-sm-2">
            <div class="row">
                <div class="col-sm-4"><b>Firstname</b></div>
                <div class="col-sm-9"><?php echo $user["firstname"]; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4"><b>Lastname</b></div>
                <div class="col-sm-9"><?php echo $user["lastname"]; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4"><b>Email</b></div>
                <div class="col-sm-9"><?php echo $user["email"]; ?></div>
            </div>
            <div class="row">
                <div class="col-sm-4"><b>Username</b></div>
                <div class="col-sm-9"><?php echo $user["username"]; ?></div>
            </div>
        </div>
    </div>

<?php if($ID == $_SESSION["id"]) { ?>
    <button class="btn btn-info col-sm-6 offset-sm-3 text-center my-3" data-toggle="modal" data-target="#editProfile">Edit Profile</button>    

    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="editProfileLabel">Edit your profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="fas fa-times text-light"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal col-sm-8 offset-sm-2" action="<?php echo basename($_SERVER['REQUEST_URI']); ?>">
                            <div class="form-group row">
                                <label class="control-label col-sm-3 text-dark" for="firstName">Firstname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstName" placeholder="Enter Firstname" name="firstName" value="<?php echo $user["firstName"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 text-dark" for="lastName">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Enter Lastname" name="lastName" value="<?php echo $user["lastName"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 text-dark" for="email">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $user["email"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 text-dark" for="username">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="<?php echo $user["username"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 text-dark" for="password">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?php echo $user["password"]; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">        
                                <div class="offset-sm-3 col-sm-9">
                                    <button type="submit" class="btn btn-dark col-sm-12">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php if(isset($success) && $success) { ?>
    <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
        Profile updated successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } else if(isset($success)) { ?>
    <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
        Error : Couldn't update profile
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }

include "templates/footer.php"; ?>