<?php
require_once "../controller/connection.php";
require_once "../controller/conexion.php";
// require_once "../modal/mesa.php";

$id_mesa = $_POST['id_table'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$fecha_orden = date("Y/m/d", strtotime($fecha));

$sql = "SELECT id_mesa, fecha, hora FROM tbl_reserva WHERE id_mesa='{$id_mesa}' AND fecha='{$fecha_orden}' AND hora='{$hora}'";

$resultado = mysqli_query($conexion,$sql);

$num=mysqli_num_rows($resultado);

if ($num==1){
?>
<head>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        echo "<script>  

        location.href='../pages/terraza1.php?error';
    
        </script>";

}else{
    $stmt=$pdo->prepare("INSERT INTO tbl_reserva(id, id_mesa, fecha, hora) VALUES (null, :idm , :dat, :tim)");                
    $stmt->bindParam(':idm', $id_mesa);
    $stmt->bindParam(':dat', $fecha_orden);
    $stmt->bindParam(':tim', $hora);

    $stmt->execute();
    echo "<script>  

    location.href='../pages/terraza1.php';

    </script>";
}


