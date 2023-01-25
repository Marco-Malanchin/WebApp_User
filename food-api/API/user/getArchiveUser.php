<?php
require("../../COMMON/connect.php");
require ('../../MODEL/user.php');

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$db_conn = $db->connect();

$user = new User($db_conn);

$user->getArchiveUser();

?>
