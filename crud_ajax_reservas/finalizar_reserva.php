<?php
    require "../controller/conexion.php";
    $data = $_POST['id'];

    $query->beginTransaction();
    $query = $pdo->prepare("DELETE FROM tbl_reserva WHERE id = :id");
    $query = $pdo->prepare("UPDATE mesa SET estado = 'Libre' FROM tbl_mesa as mesa inner join tbl_reserva as reserva on mesa.id = reserva.id_mesa WHERE id = :id");

    $query->bindParam(":id", $data);
    $query->execute();



    echo "ok";
?>