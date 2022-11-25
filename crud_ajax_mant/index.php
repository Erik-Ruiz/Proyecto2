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
    <?php require_once '../components/cabecera.php';?>
    <link rel="stylesheet" href="../css/terraza.css" />
<!-- VALIDACIONES     -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/valid-form.js"></script>

</head>

<body>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="../pages/admin.php">Administrador <a class="navbar-brand" href="#">Usuarios Mantenimiento</a></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Admin Mantenimiento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

        </div>
    </nav>
    <div style="margin-top: 10%;" class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Registro de Mantenimiento</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="hidden" name="idp" id="idp" value="" onsubmit="return validacion();">
                                <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Correo</label>
                                <input type="text" name="correo" id="correo" placeholder="Correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block">
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
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Ajustes</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>    
    
    <script src="../js/valid-form-ajax_mant.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>