<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../../MODEL/order.php';

$data = json_decode(file_get_contents('php://input'));

if(empty($data) || empty($data->id) || empty($data->status)){
    echo json_encode("bad request");
    die();
}

$db = new Database();
$db_conn = $db->connect();
$order = new Order($db_conn);

$result = $order->setStatusPaninara($data->id, $data->status);

if($result == true){
    echo json_encode("1");
}
else{
    echo json_encode("Error");
}
die();
?>