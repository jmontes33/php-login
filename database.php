<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

try {
    $connect = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Conexion fallida: '.$e->getMessage() );
}