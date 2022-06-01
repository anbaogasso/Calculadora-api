<?php
include_once "cors.php";
include_once "functions.php";
header('Content-Type: application/json');

if (!isset($_GET["model"]) && !isset($_GET["marca"])) {
    echo json_encode(null);
    exit;
}
$model = $_GET["model"];
$marca = $_GET["marca"];
$device = getIdClientDevice($model, $marca);
echo json_encode($device); // json_encode creates the json-specific formatting