<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../MODEL/order.php';

$db = new Database();
$db_conn = $db->connect();

$order = new Order($db_conn);
$result = $order->getOrderByClassAndBreak();

if($result->num_rows > 0){
    $output = array();
    while($row = $result->fetch_assoc()){
        array_push($output, [$row['id'],$row['year'], $row['section'], $row['created'], $row['pickup'], $row['break'],$row['status']]);
    }
    echo json_encode($output);
}
else{
    echo json_encode("Nothing");
}
?>