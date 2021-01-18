<?php
function send_err($code,$message){
    $response[] = array("code"=>$code,"message"=>$message);
    die(json_encode($response));exit;
}
?>