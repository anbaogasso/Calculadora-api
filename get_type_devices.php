<?php
include_once "cors.php";
header('Content-Type: application/json');
if (!isset($_GET["type"])) {
    echo json_encode(null);
    exit;
}
$type = $_GET["type"];
include_once "functions.php";
$typeDevice = getTypeDevices($type);
echo json_encode($typeDevice); // json_encode creates the json-specific formatting