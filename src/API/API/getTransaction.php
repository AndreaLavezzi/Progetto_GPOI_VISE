<?php
require("../Common/connect.php");
require("../Model/card.php");

header("Content-type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"));

if (empty($data->userID)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$transaction = new Card($conn);

$transactionValue = $transaction->getTransaction($data->userID);

$transactionValue = $transactionValue->fetch_assoc();

if($transactionValue == false){
    http_response_code(404);
    echo json_encode(["response" => "No transactions found"]);
    die();
}
else{
    http_response_code(200);
    echo json_encode([$transactionValue]);
    die();
}
?>