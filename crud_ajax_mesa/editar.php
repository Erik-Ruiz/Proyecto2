<?php
    require "conexion.php";
    $id=$_POST['id'];
    $query = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>