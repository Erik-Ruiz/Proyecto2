<?php
    require "../controller/conexion.php";
    //$consulta=null;


if(!empty($_POST['busqueda'])){
    $data=$_POST['busqueda'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_camarero WHERE id LIKE '%".$data."%' OR nombre LIKE '%".$data."%' OR apellido LIKE '%".$data."%' OR correo LIKE '%".$data."%'");
    $consulta->execute();
}else{
    //echo 'hola';
    $consulta = $pdo->prepare("SELECT * FROM tbl_camarero");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

