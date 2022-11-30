<?php
    require "../controller/conexion.php";
    $data = $_POST['id'];
    
    $query = $pdo->prepare("DELETE FROM tbl_reserva WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
?>