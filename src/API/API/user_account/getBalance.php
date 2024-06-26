<?php

require(__DIR__ . "/../../Common/connect.php");
require(__DIR__ . "/../../Model/user_account.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

if(!isset($_GET['username'])){
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$username = $_GET['username'];

$db = new Database();
$conn = $db->connect();
$balance = new UserAccount($conn);

$result_balance = $balance->getUserAccountBalance($username);

$result_balance = $result_balance->fetch_assoc()['balance'];

if($result_balance == false){
    http_response_code(401);
    echo json_encode(["response" => "Balance not found"]);
    die();
}
else{
    http_response_code(200);
    echo json_encode(["balance" => $result_balance]);
    die();
}

?>