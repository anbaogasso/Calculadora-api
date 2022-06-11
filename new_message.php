<?php
header('Content-Type: application/json');
include_once "cors.php";
$message = json_decode(file_get_contents("php://input"));
include_once "functions.php";
$result = newMessage($message);
echo json_encode($message);
