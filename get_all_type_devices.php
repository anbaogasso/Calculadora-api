<?php

include_once "functions.php";
header('Content-Type: application/json');
$device = getAllTypeDevices();
echo json_encode($device); // json_encode creates the json-specific formatting