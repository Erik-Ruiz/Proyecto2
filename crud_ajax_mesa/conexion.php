<?php
    $server = "mysql:dbname=2223_ruizerik;host=localhost";
    $user = "root";
    $pass = "";
    try {
        $pdo = new PDO($server, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    } catch (PDOException $e) {
        echo "conexion fallida" .$e->getMessage();
    }

?>