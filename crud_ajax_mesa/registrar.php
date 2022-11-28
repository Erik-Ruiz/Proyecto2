<?php
if (isset($_POST)) {
    $nombre = $_POST['nombre_mesa'];
    $estado = $_POST['estado'];
    $sala = $_POST['id_sala'];



    require "../controller/conexion.php";
    if (empty($_POST['idp'])){
        $stmt = $pdo->prepare("INSERT INTO tbl_mesa (nombre_mesa, estado, id_sala,id_camarero,id_mantenimiento) VALUES (:nom , :est, :sal, :cam, :mant)");
        // $sql = "INSERT INTO tbl_mesa (nombre_mesa, estado, id_sala) VALUES ($nombre , $estado, $sala)";

        $cam = 8;
        $mant = 1;
        echo $sql;
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':est', $estado);
        $stmt->bindParam(':sal', $sala);  
        $stmt->bindParam(':cam', $cam);      
        $stmt->bindParam(':mant', $mant);      

        $stmt->execute();
        $pdo = null;
        echo "ok";
    }else{

        $id = $_POST['idp'];
        $stmt = $pdo->prepare("UPDATE tbl_mesa SET nombre_mesa = :nom, estado = :est, id_sala = :sal WHERE id = :id");
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':est', $estado);
        $stmt->bindParam(':sal', $sala);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $pdo = null;
        echo "modificado";


    }
    
}