<?php
include_once "cors.php";
include_once "functions.php";
header('Content-Type: application/json');
$devices = getDevices();
echo json_encode($devices); // json_encode creates the json-specific formatting