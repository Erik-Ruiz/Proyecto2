<?php


class Mesa{


    public static function getReservas(){

    }

    public static function CrearReserva($id_mesa,$fecha, $hora){
        require_once "../controller/conexion.php";
        $reserva=new Mesa(null, $id_mesa, $fecha, $hora);

        $stmt=$pdo->prepare("INSERT INTO tbl_reserva(id, id_mesa, fecha, hora) VALUES (:id, :id_mesa, :fecha, :hora)");
        $stmt->execute((array)$reserva);
    }

}