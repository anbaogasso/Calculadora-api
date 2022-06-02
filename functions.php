<?php

function getDevice($id) {
    $bd = getConnection();
    $sentence = $bd->prepare("SELECT * FROM devices WHERE id = ?");
    $sentence->execute([$id]);
    return $sentence->fetchObject();
}

function getDevices() {
    $bd = getConnection();
    $sentence = $bd->query("SELECT id, model, marca, pes FROM devices");
    return $sentence->fetchAll();
}

function getClientDevice() {
    $bd = getConnection();
    $sentence = $bd->query("SELECT id, model, marca, consum, tipoconsum FROM newClient");
    return $sentence->fetchAll();
}

function getIdClientDevice($model, $marca) {
    $bd = getConnection();
    $sentence = $bd->prepare("SELECT id FROM newClient WHERE model = ? AND marca = ?");
    $sentence->execute(array($model, $marca));
    return $sentence->fetchObject();
}

function getAllClientDevice($id) {
    $bd = getConnection();
    $sentence = $bd->prepare("SELECT * FROM newClient WHERE id = ?");
    $sentence->execute([$id]);
    return $sentence->fetchObject();
}

function saveDevice($device) {
    $bd = getConnection();
    $sentence = $bd->prepare("INSERT INTO newClient(model, marca, consum, tipoconsum) VALUES (?, ?, ?, ?)");
    return $sentence->execute([$device->model, $device->marca, $device->consum, $device->tipoconsum]);
}

function deleteDevice($id) {
    $bd = getConnection();
    $sentence = $bd->prepare("DELETE FROM newClient WHERE id = ?");
    return $sentence->execute([$id]);
}

function getEnvironmentVariable($key)
{
    if (defined("_ENV_CACHE")) {
        $vars = _ENV_CACHE;
    } else {
        $file = "env.php";
        if (!file_exists($file)) {
            throw new Exception("El archivo de las variables de entorno ($file) no existe. Favor de crearlo");
        }
        $vars = parse_ini_file($file);
        define("_ENV_CACHE", $vars);
    }
    if (isset($vars[$key])) {
        return $vars[$key];
    } else {
        throw new Exception("La clave especificada (" . $key . ") no existe en el archivo de las variables de entorno");
    }
}

function getConnection() {
    $password = getEnvironmentVariable("MYSQL_PASSWORD");
    $user = getEnvironmentVariable("MYSQL_USER");
    $dbName = getEnvironmentVariable("MYSQL_DATABASE_NAME");
    $server = getEnvironmentVariable("MYSQL_HOST");
    $database = new PDO ('mysql:host=' . $server .';dbname=' . $dbName, $user, $password);
    $database->query("set names utf8;");
    $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $database;
}