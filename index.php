<?php include "templates/header.php";?>

<table>
    <thead>
        <td>    
            <h1 class="col-sm-6 offset-sm-3 text-center py-4">S.V.I</h1>
        </td>
    </thead>
    <tbody>
        <tr>
            <td>
                <h6 class="col-sm-12 text-center py-4" style="margin-top: 10%">Smishing Vishing Identifier</h6>
            </td>
        </tr>
        <tr>
<?php   
if(isset($_SESSION["connected"]) && $_SESSION["connected"]) { ?>
            <td><a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="phone.php" role="button">Load Application</a></td>
        
<?php } 
else { ?>
            <td><a class="btn btn-info btn-lg col-lg-4 offset-lg-4 text-center py-4" href="register.php" role="button">Sign up</a></td>
<?php } ?>
        </tr>
    </tbody>
</table>
 <?php include "templates/footer.php";?>