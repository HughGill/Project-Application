<?php include "templates/header.php"; 

    require_once __DIR__ . '/vendor/autoload.php';

    $keypair = new \Nexmo\Client\Credentials\Keypair(file_get_contents('private.key'), 'b8846262-5efa-49e4-ac83-0252a7b44bfb');
    $client = new \Nexmo\Client($keypair);
    
    $filter = new \Nexmo\Call\Filter();
    $filter->setStart(new DateTime('- 10 day'));
    $filter->setEnd(new DateTime);
    
    foreach ($client->calls($filter) as $call) {
        while(json_encode($call).PHP_EOL > 0) { ?>
            <div class="container">
                <form action="log.php" method="GET">
                    <div id="" name="" class="">
                        <label id="" name="" class=""><b>Number </b><?php echo $call('from');?></label>
                    </div>
                    <div id="" name="" class="">
                        <label id="" name="" class=""><b>Duration </b><?php $call('end_time') -  $call('start_time');?></label>
                    </div>
                </form>
            </div>
        <?php }
    } ?>
	
<?php include "templates/footer.php"
?>