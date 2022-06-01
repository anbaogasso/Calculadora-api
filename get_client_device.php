<?php
include_once "cors.php";
include_once "functions.php";
header('Content-Type: application/json');
$client = getClientDevice();
echo json_encode($client); // json_encode creates the json-specific formatting
