<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../MODEL/cart.php';


$data = json_decode(file_get_contents("php://input"));

if (empty($data) || empty($data->user) || empty($data->product) || empty($data->quantity)) {
    http_response_code(400);
    echo json_encode(["message" => "empty or missing value"]);
    die();
}

$dtbase = new Database();
$conn = $dtbase->connect();

$cart = new Cart();
$queryAddItem = $cart->addItem($data->product, $data->user, $data->quantity);

$result = $conn->query($queryAddItem);

if ($result) {
    http_response_code(200);
    echo json_encode(["message" => "Item added"]);
} else {
    http_response_code(503);
    echo json_encode(["message" => "Couldn't add the item"]);
}
die();
?>