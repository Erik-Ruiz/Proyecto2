<?php
require_once "../controller/conexion.php";
require_once "../modal/mesa.php";

$id_mesa = $_POST['id_table'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$fecha_orden = date("Y/m/d", strtotime($fecha));

// echo $id_mesa,$fecha_orden,$hora;
// die();
// Mesa::CrearReserva($id_mesa,$fecha,$hora);

$stmt=$pdo->prepare("INSERT INTO tbl_reserva(id, id_mesa, fecha, hora) VALUES (null, :idm , :dat, :tim)");                
    $stmt->bindParam(':idm', $id_mesa);
    $stmt->bindParam(':dat', $fecha_orden);
    $stmt->bindParam(':tim', $hora);

$stmt->execute();
echo "<script>  

location.href='../pages/terraza1.php';

</script>";