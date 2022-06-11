<?php

//Tabla clientDevice

function getClientDevice() {
    $bd = getConnection();
    $sentence = $bd->query("SELECT id, model, brand, type, weight, units, hours, consumtype FROM clientDevice");
    return $sentence->fetchAll();
}

function getIdClientDevice($model, $brand) {
    $bd = getConnection();
    $sentence = $bd->prepare("SELECT * FROM clientDevice WHERE model = ? AND brand = ?");
    $sentence->execute(array($model, $brand));
    return $sentence->fetchObject();
}

function saveDevice($device) {
    $bd = getConnection();
    $sentence = $bd->prepare("INSERT INTO clientDevice(model, brand, type, weight, units, hours, consumtype) VALUES (?, ?, ?, ?, ?, ?, ?)");
    return $sentence->execute([$device->model, $device->brand, $device->type, $device->weight, $device->units, $device->hours, $device->consumtype]);
}

function deleteDevice($id) {
    $bd = getConnection();
    $sentence = $bd->prepare("DELETE FROM clientDevice WHERE id = ?");
    return $sentence->execute([$id]);
}

//Tabla typeDevices

function getTypeDevices($type) {
    $bd = getConnection();
    $sentence = $bd->prepare("SELECT type, footprint, trees, cars, water FROM typeDevices WHERE type = ?");
    $sentence->execute([$type]);
    return $sentence->fetchObject();
}

//Tabla contactMe

function newMessage($message) {
    $bd = getConnection();
    $sentence = $bd->prepare("INSERT INTO contactMe(name, email, subject, text) VALUES (?, ?, ?, ?)");
    return $sentence->execute([$message->name, $message->email, $message->subject, $message->text]);
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