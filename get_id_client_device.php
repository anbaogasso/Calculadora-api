<?php
include_once "cors.php";
include_once "functions.php";
header('Content-Type: application/json');

if (!isset($_GET["model"]) && !isset($_GET["brand"])) {
    echo json_encode(null);
    exit;
}
$model = $_GET["model"];
$brand = $_GET["brand"];
$device = getIdClientDevice($model, $brand);
echo json_encode($device); // json_encode creates the json-specific formatting