<?php
if (isset($_POST)) {
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $sala = $_POST['sala'];


    require("conexion.php");
    if (empty($_POST['idp'])){
        $stmt = $pdo->prepare("INSERT INTO tbl_mesa (nombre_mesa, estado, id_sala) VALUES (:nom , :est, :sal)");
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':est', $estado);
        $stmt->bindParam(':sal', $sala);      
        $stmt->execute();
        $pdo = null;
        echo "ok";
    }else{

            $id = $_POST['idp'];
            $stmt = $pdo->prepare("UPDATE tbl_camarero SET nombre_mesa = :nom, estado = :est, id_sala = :sal, WHERE id = :id");
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':est', $estado);
            $stmt->bindParam(':sal', $sala);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $pdo = null;
            echo "modificado";


    }
    
}