<?php include "templates/header.php";?>

<h1 class="col-sm-6 offset-sm-3 text-center py-4">S.V.I</h1>

<h6 class="col-sm-12 text-center py-4" style="margin-top: 10%">Smishing Vishing Identifier</h6>

<!--?php require 'vendor/autoload.php'; $app = new SlimApp(); $app->post('/sms/{number}', function ($request, $response, $args) {<br ? return $response->write("Sending an SMS to " . $args['number']);
});

$app->run(); -->

<?php 
if(isset($_SESSION["connected"]) && $_SESSION["connected"]) { ?>
    <a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="phone.php" role="button">Load Application</a>
        
<?php } 
else { ?>
    <a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="register.php" role="button">Sign up</a>
<?php }
	
 include "templates/footer.php";?>