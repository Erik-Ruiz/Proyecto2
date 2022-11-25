<?php

require "connection.php";
$id=$_POST['id'];
$funcion=$_POST['funcion'];

if ($funcion == 'Libre') {
    libre($id);
} else if($funcion == 'Ocupado') {
    ocupar($id);
}else if($funcion == 'Mantenimiento'){
    reparar_camarero($id);
}else if($funcion == 'Reparado'){
    Reparado($id);
}

function ocupar($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET cont_personas = cont_personas+4, estado = 'Ocupado' WHERE id = $id");
    $DateAndTime = date('Y-m-d h:i:s', time());  
    $conexion->query("INSERT INTO tbl_t_comer (t_i_comer,t_f_comer,id_mesa) VALUES ('$DateAndTime','',$id)");

    $conexion->commit();

     echo "<script>location.href='../pages/terraza1.php'</script>";
}

function libre($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id");
    $DateAndTimeF = date('Y-m-d h:i:s', time());
    $conexion->query("UPDATE tbl_t_comer SET t_f_comer = '$DateAndTimeF' WHERE id_mesa = $id");

    $conexion->commit();
    // $sql2 = "UPDATE tbl_mesa SET estado = 'Libre' WHERE id = $id";
    // $stmt=mysqli_stmt_init($conexionion);
    // mysqli_stmt_prepare($stmt,$sql2);
    // mysqli_stmt_execute($stmt);
     echo "<script>location.href='../pages/terraza1.php'</script>";
}

function reparar_camarero($id){
    require "./connection.php";

    $conexion->autocommit(false);
    
    $conexion->query("UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id");
    $DateAndTime = date('Y-m-d h:i:s', time());  
    $conexion->query("INSERT INTO tbl_t_reparacion (t_i_reparacion,t_f_reparacion,id_mesa) VALUES ('$DateAndTime','',$id)");
    
    $conexion->commit();

    // $sql3 = "UPDATE tbl_mesa SET estado = 'Mantenimiento' WHERE id = $id";
    // $stmt=mysqli_stmt_init($conexionion);
    // mysqli_stmt_prepare($stmt,$sql3);
    // mysqli_stmt_execute($stmt);
    echo "<script>location.href='../pages/terraza1.php'</script>";
}


function Reparado($id){
    require "./connection.php";

    $conexion->autocommit(false);

    $conexion->query("UPDATE tbl_mesa SET cont_reparaciones = cont_reparaciones+1, estado = 'Libre' WHERE id = $id");
    $DateAndTimeF = date('Y-m-d h:i:s', time());
    $conexion->query("UPDATE tbl_t_reparacion SET t_f_reparacion = '$DateAndTimeF' WHERE id_mesa = $id");

    $conexion->commit();

    echo "<script>location.href='../pages/mantenimiento.php'</script>";
}

function tiempoComer(){

    include "connection.php";

    $sql1 = "SELECT TIMESTAMPDIFF(SECOND,t_i_comer,t_f_comer)/60 AS 'Dif_Comer' FROM `tbl_t_comer`;";
    $resultado1 = mysqli_query($conexion,$sql1);
    $resul1=$resultado1->fetch_all(MYSQLI_ASSOC);


    return $resul1;
}

function tiempoReparacion(){

    include "connection.php";

    $sql1 = "SELECT TIMESTAMPDIFF(SECOND,t_i_reparacion,t_f_reparacion) AS 'Dif_Reparar' FROM `tbl_t_reparacion`;";
    $resultado1 = mysqli_query($conexion,$sql1);
    $resul2=$resultado1->fetch_all(MYSQLI_ASSOC);


    return $resul2;
}

?>