<?php
    require "../controller/conexion.php";


if(!empty($_POST['busqueda'])){
    $data=$_POST['busqueda'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id LIKE '%".$data."%' OR nombre_mesa LIKE '%".$data."%' OR estado LIKE '%".$data."%' OR id_sala LIKE '%".$data."%'");
    $consulta->execute();
}else{
    $consulta = $pdo->prepare("SELECT * FROM tbl_mesa");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

