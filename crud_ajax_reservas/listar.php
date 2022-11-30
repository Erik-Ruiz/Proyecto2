<?php
    require "../controller/conexion.php";


if(!empty($_POST['busqueda'])){
    $data=$_POST['busqueda'];
    $consulta = $pdo->prepare("SELECT * FROM tbl_reserva WHERE id LIKE '%".$data."%' OR fecha LIKE '%".$data."%' OR hora LIKE '%".$data."%' OR id_mesa LIKE '%".$data."%'");
    $consulta->execute();
}else{
    $consulta = $pdo->prepare("SELECT * FROM tbl_reserva");
    $consulta->execute();
}


$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);

