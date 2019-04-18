<?php 
require_once __DIR__ . '/vendor/autoload.php';
// Building Blocks
// 1. Receive a Phone Call
// 2. Play Text-to-Speech to an inbound call
// Retrive the inbound call details
$from = $_GET['from'];
$to = $_GET['to'];
$ncco = [
    [
        'action' => 'talk',
        'voiceName' => 'Jennifer',
        'text' => "This is a call from $from. Thank you for calling, this the Nexmo API."
    ]
];

header('Content-Type: application/json');
$json = json_encode($ncco);
echo($json);