<?php
include_once "cors.php";
header('Content-Type: application/json');
$message = json_decode(file_get_contents("php://input"));
include_once "functions.php";
$result = newMessage($message);
echo json_encode($message);
