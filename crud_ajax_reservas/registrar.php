<?php
    $id_mesa = $_POST['id_mesa'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idp = $_POST['idp'];

    // echo $id_mesa,$fecha,$hora;
    // die();
    $fecha_orden = date("Y/m/d", strtotime($fecha));
    

    require "../components/cabecera.php";
    require "../controller/conexion.php";
    if (!empty($_POST['idp'])){
        $stmt = $pdo->prepare("UPDATE tbl_reserva SET id_mesa = :idm, fecha = :feo, hora = :hor WHERE id = :idp");
        $stmt->bindParam(':idm', $id_mesa);
        $stmt->bindParam(':feo', $fecha_orden);
        $stmt->bindParam(':hor', $hora);
        $stmt->bindParam("idp", $idp);  

        $stmt->execute();
        $pdo = null;
        echo "modificado";
    }
    
