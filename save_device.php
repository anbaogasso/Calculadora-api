<?php
header('Content-Type: application/json');
include_once "cors.php";
$device = json_decode(file_get_contents("php://input"));
include_once "functions.php";
$result = saveDevice($device);
echo json_encode($device);