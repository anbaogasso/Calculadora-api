<?php
include_once "cors.php";
include_once "functions.php";
$devices = getDevices();
echo json_encode($devices);