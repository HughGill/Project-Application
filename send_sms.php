<?php 
require __DIR__ . '/vendor/autoload.php';

$basic  = new \Nexmo\Client\Credentials\Basic('301dce12', 'P8lWKyaGIZ1BaFkf');
$client = new \Nexmo\Client($basic);
$Recipicent = $_POST[''];
$Text = $_POST[''];

$message = $client->message()->send([
    'to' => '353861036746',
    'from' => 'Nexmo',
    'text' => 'Hello from Nexmo'
]);
?>

