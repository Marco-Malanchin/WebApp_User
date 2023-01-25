<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once dirname(__FILE__) . '/../../../COMMON/connect.php';
include_once dirname(__FILE__) . '/../../../MODEL/pickup.php';

$database = new Database();
$db = $database->connect();

if (!strpos($_SERVER["REQUEST_URI"], "?id=")) // Controlla se l'URI contiene ?BREAK_ID
{
    http_response_code(400);
    die(json_encode(array("Message" => "Bad request")));
}

$id = explode("?id=" ,$_SERVER['REQUEST_URI'])[1]; // Viene ricavato quello che c'è dopo ?BREAK_ID

if(empty($id)){
    http_response_code(400);
    echo json_encode(["Message" => "No id found"]);
    die();
}

$pickup = new PickUp($db);

$stmt = $pickup->getPickupId($id);


if ($stmt->num_rows > 0) // Se la funzione getArchiveOrder ha ritornato dei record
{
    $order_arr = array();
    while($record = $stmt->fetch_assoc()) // trasforma una riga in un array e lo fa per tutte le righe di un record
    {
       extract($record);
       $order_record = array(
        'id' => $id,
        'user' => $user,
        'created' => $created,
        'pickup' => $pickup,
        'break' => $break,
        'status' => $status,
       );
       array_push($order_arr, $order_record);
    }
    http_response_code(200);
    echo json_encode($order_arr, JSON_PRETTY_PRINT);
    //return json_encode($order_arr);
}
else {
    http_response_code(404);
    echo json_encode(array("Message" => "No record"));
   // return json_encode(array("Message" => "No record"));
}
die();
?>