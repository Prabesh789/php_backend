<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept'); /**HAndel pre-filght request */

include_once '../../models/seller.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($seller -> validate_params($_POST['name'])){
        $seller-> name = $_POST['name'];
    }else{
        echo json_encode(array('sucess'=> 0, 'message' => 'Name is required'));
        die();
    }
}else{
    die(header('HTTP/1.1 405 Request method not allowed'));
}
 