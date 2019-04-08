<?php
include_once 'dao/server.php';
$connection = mysqli_connect(Server::getDB_HOST(),Server::getDB_USERNAME(), Server::getDB_PASSWORD(), Server::getDB_DATABASE());
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, Server::getDB_DATABASE());
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
