<?php
if (isset($_POST)) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    require "../controller/conexion.php";
    if (empty($_POST['idp'])){
        $stmt = $pdo->prepare("INSERT INTO tbl_camarero (nombre, apellido, correo, password) VALUES (:nom , :ape, :cor, :pas)");
        $stmt->bindParam(':nom', $nombre);
        $stmt->bindParam(':ape', $apellido);
        $stmt->bindParam(':cor', $correo);
        $stmt->bindParam(':pas', sha1($password));        
        $stmt->execute();
        $pdo = null;
        echo "ok";
    }else{
        if(!empty($password)){
            $id = $_POST['idp'];
            $stmt = $pdo->prepare("UPDATE tbl_camarero SET nombre = :nom, apellido = :ape, correo = :cor, password = :pas WHERE id = :id");
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':ape', $apellido);
            $stmt->bindParam(':cor', $correo);
            $stmt->bindParam(':pas', sha1($password));
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $pdo = null;
            echo "modificado";
        }else{
            $id = $_POST['idp'];
            $stmt = $pdo->prepare("UPDATE tbl_camarero SET nombre = :nom, apellido = :ape, correo = :cor WHERE id = :id");
            $stmt->bindParam(':nom', $nombre);
            $stmt->bindParam(':ape', $apellido);
            $stmt->bindParam(':cor', $correo);
            $stmt->bindParam("id", $id);
            $stmt->execute();
            $pdo = null;
            echo "modificado";
        }

    }
    
}
