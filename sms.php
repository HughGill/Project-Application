<?php

$request = array_merge($_POST,$_GET);

if(!isset($request['to']) || !isset($request['text']) || !isset($request['msisdn'])){
    error_log('No inbound Message');
    return;
}

echo "From " . $request['msisdn'];
echo "Text " . $request['text'];


?>