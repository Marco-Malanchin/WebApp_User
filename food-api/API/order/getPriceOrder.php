<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../MODEL/order.php';

$db = new Database();
$db_conn = $db->connect();

if (!strpos($_SERVER["REQUEST_URI"], "?id=")) // Controlla se l'URI contiene ?BREAK_ID
{
    http_response_code(400);
    die(json_encode(array("Message" => "Bad request")));
}

$id_order = explode("?id=" ,$_SERVER['REQUEST_URI'])[1]; // Viene ricavato quello che c'è dopo ?BREAK_ID

if(empty($id_order)){
    http_response_code(400);
    echo json_encode(["Message" => "No id found"]);
    die();
}

$order = new Order($db_conn);

$result = $order->getPriceOrder($id_order); 

if($result==true){
    $output = array();
    while($row = $result->fetch_assoc()){
        array_push($output, [$row['price']]);
    }
    echo json_encode($output);
}
else{
    echo json_encode("Nothing");
}
?>