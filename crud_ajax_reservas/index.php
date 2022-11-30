<?php
require_once '../components/cabecera.php';
session_start();
if(empty($_SESSION['login'])){
  echo "<script>location.href='../index.php'</script>";

  die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php Vanilla</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="../pages/camareros.php">Camarero <a class="navbar-brand" href="#">Registro de Reservas</a></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body align-self-center text-center">





                    <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
                        <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
                    </form>

                </div>
            </div>
        </div>
    </nav>
    <div style="margin-top: 10%;" class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Registro de Reservas</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Id_Mesa</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="id_mesa" id="id_mesa" placeholder="Nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Fecha</label>
                                
                                <input type="date" name="fecha" id="fecha" placeholder="Fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Hora</label>
                                
                                <input type="time" name="hora" id="hora" placeholder="Hora" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Actualizar" id="actualizar" class="btn btn-primary btn-block">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post" id="frmbusqueda">
                            <div class="form-group">
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Id_Mesa</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ajustes</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <script src="../js/valid-form-ajax_cam.js"></script> -->
    <script src="script.js"></script>
</body>

</html>