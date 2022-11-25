<?php
require_once "config.php";

$server = SERVIDOR;
$username = USUARIO;
$password = PASSWORD;
$bd = BD;
// Nos conectamos a la base de datos mediante la funcion mysqli_connect
$conexion = mysqli_connect($server,$username,$password,$bd);

$servidor = "mysql:host=".SERVIDOR.";dbname=".BD;
// $servidor2 = "mysql:dbname=bd_crud_vanila;host=localhost";

// $user = "root";
// $pass = "";

// try{
//     $pdo = new PDO($servidor2, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
//     //echo "<script>alert('conexion establecida')</script>";
//     }
//     catch(Exception $e){
//     echo $e->getMessage();
//     echo "<script>alert('error en la conexion')</script>";
//     }


