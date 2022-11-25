<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../index.php'</script>";

    die();
  }
    require_once '../components/cabecera.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php Vanilla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
<section id="paginas-ajax">
        <div class="container">
            <h2>AJUSTES</h2>
            <div class="programas">
                <div class="carta">
                    <h3>Usuarios Camareros</h3>
                    <a href="../crud_ajax_cam/index.php">
                        <button style="border-radius: 10px;">Usuarios</button>
                    </a> 
                </div>
                <div class="carta">
                    <h3>Usuarios Mantenimiento</h3>
                    <a href="../crud_ajax_mant/index.php">
                        <button style="border-radius: 10px;">Usuarios</button>
                    </a> 
                </div> 
                <div class="carta">
                    <h3>Mesas</h3>
                    <a href="../crud_ajax_mesa/index.php">
                        <button style="border-radius: 10px;">Mesas</button>
                    </a> 
                </div> 
            </div>
        </div>
    </section>
</html>