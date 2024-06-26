<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include dirname(__FILE__) . '/../Common/connect.php';
include dirname(__FILE__) . '/../Model/payment.php';

$database = new Database_Vise();
$db = $database->connect();

$data = json_decode(file_get_contents("php://input"));

if (empty($data->datetime) || empty($data->transaction_type) || empty($data->amount) || empty($data->reciver) || empty($data->account_id)) {
    http_response_code(400);
    echo json_encode(array("message" => "Incomplete data."));
    die();
}

$transaction = new Payment($db);

$datetime = $data->datetime;
$transaction_type = $data->transaction_type;
$reciver = $data->reciver;
$amount = $data->amount;
$account_id = $data->account_id;

$sender = $transaction->get_name_surname($account_id);


if ($transaction->register_transactions($datetime, $transaction_type, $amount, $sender, $reciver, $account_id)) {
    http_response_code(200);
    echo json_encode(array("message" => "Recorded transaction."));
} else {
    http_response_code(503);
    echo json_encode(array("message" => "Error during the payment."));
    die();
}
?>