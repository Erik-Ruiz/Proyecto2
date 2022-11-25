<?php

class Contadores{



    public static function contadorReparaciones(){

        include "connection.php";
    
        $sql = "SELECT sum(cont_reparaciones) as 'Am' FROM tbl_mesa";
        $resultado = mysqli_query($conexion,$sql);
        $resul=$resultado->fetch_all(MYSQLI_ASSOC);
        return $resul;
    }
    public static function contadorPersonas(){

        include "connection.php";
    
        $sql = "SELECT sum(cont_personas) as 'Am' FROM tbl_mesa";
        $resultado = mysqli_query($conexion,$sql);
        $resul=$resultado->fetch_all(MYSQLI_ASSOC);
        return $resul;
    }




}