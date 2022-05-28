<?php
$domainAllowed = "http://localhost:3000";
header("Access-Control-Allow-Origin: $domainAllowed");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");