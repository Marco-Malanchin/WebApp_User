<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../MODEL/order.php';
require __DIR__ . '/../../MODEL/product.php';

$data = json_decode(file_get_contents("php://input"));

if(empty($data)){
    echo json_encode(["Message" => "Bad Request"]);
}

$db = new Database();
$db_conn = $db->connect();
$product = new ProductController($db_conn);

/*esempio json
{
    "products":
        [
            {"ID": 1, "quantity" : 3, "action" : "set"},
            {"ID": 2, "quantity" : 5, "action" : "add"},
            {"ID": 3, "quantity" : 6, "action" : "remove"}
        ]
}
*/

    switch ($data->action){
        case "set":
            $response = $product->setProductQuantity($data->ID, $data->quantity);
            break;
        case "add":
            $response = $product->addProductQuantity($data->ID, $data->quantity);
            break;
        case "remove":
            $response = $product->removeProductQuantity($data->ID, $data->quantity);
            break;
    }

if($response == 1){
    http_response_code(201);
    die(json_encode(array("Message"=> "Well Done")));
}else{
    http_response_code(503);
    die(json_encode(array("Message"=>'Error')));
}
 
?>