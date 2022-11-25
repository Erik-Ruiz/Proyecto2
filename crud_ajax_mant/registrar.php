<?php
if (isset($_POST)) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    require("conexion.php");
    if (empty($_POST['idp'])){
        $stmt = $pdo->prepare("INSERT INTO tbl_mantenimiento (nombre, correo, password) VALUES (:nom , :cor, :pas)");
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':cor', $correo);
        $stmt->bindParam(':pas', sha1($password));        
        $stmt->execute();
        $pdo = null;
        echo "ok";
    }else{
        if(!empty($password)){
            $id = $_POST['idp'];
            $stmt = $pdo->prepare("UPDATE tbl_mantenimiento SET nombre = :nom, correo = :cor, password = :pas WHERE id = :id");
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':cor', $correo);
            $stmt->bindParam(':pas', sha1($password));
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $pdo = null;
            echo "modificado";
        }else{
            $id = $_POST['idp'];
            $stmt = $pdo->prepare("UPDATE tbl_mantenimiento SET nombre = :nom, correo = :cor WHERE id = :id");
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':cor', $correo);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $pdo = null;
            echo "modificado";
        }

    }
    
}
