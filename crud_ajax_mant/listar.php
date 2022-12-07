<?php
    require "../controller/conexion.php";


if(!empty($_POST['busqueda'])){
    $data=$_POST['busqueda'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_mantenimiento WHERE id LIKE '%".$data."%' OR nombre LIKE '%".$data."%' OR correo LIKE '%".$data."%'");
    $consulta->execute();
}else{
    $consulta = $pdo->prepare("SELECT id, nombre, password, correo FROM tbl_mantenimiento");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

