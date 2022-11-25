<?php
require_once "conexion.php";
//$consulta=null;


if(!empty($_POST['busqueda'])){
    $data=$_POST['busqueda'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id LIKE '%".$data."%' OR nombre_mesa LIKE '%".$data."%' OR estado LIKE '%".$data."%' OR sala LIKE '%".$data."%'");
    $consulta->execute();
}else{
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

