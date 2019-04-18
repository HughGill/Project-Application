<?php include "./templates/header.php"; 
?>
<h1>Call Log</h1>

<?php
require_once __DIR__ . '/vendor/autoload.php';



$keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
$client = new \Nexmo\Client($keypair);


$filter = new \Nexmo\Call\Filter();
$filter->setStatus('completed');

foreach($client->calls($filter) as $call){
    if($call->getDirection() == "inbound"){?>
        <table></<table class="table table-light">
            <tbody>
                <tr>
                    <td><label>From: <br><?php echo "From: " . $call->getFrom();?></label></td>
                </tr> 
    <?php }
    else{?>
                <tr>
                    <td><label>To: <br><?php echo $call->getTo(); ?></label></td>
                </tr>
            </tbody>
        </table>
    <?php }
} ?>
	
<?php include "./templates/footer.php"
?>