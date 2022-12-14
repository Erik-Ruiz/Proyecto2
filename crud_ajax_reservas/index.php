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
    <script src="../js/valid-form-reservas.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8d74b7c7c2.js" crossorigin="anonymous"></script>

</head>

<body style="background-color: #BBD2C5;">
<nav class="navbar bg-light fixed-top" >
  <div class="container-fluid">

    <a class="navbar-brand" href="../pages/camareros.php">Camareros<a class="navbar-brand" href="#">Reservas</a></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
    <i class="fa-solid fa-bars" ></i>
    </button>



    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Camareros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <div class="offcanvas-body align-self-center text-center">
        
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Terrazas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../pages/terraza1.php">Terraza 1</a></li>
              <li><a class="dropdown-item" href="../pages/terraza2.php">Terraza 2</a></li>
            </ul>
          </li>
        </ul>
        
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Sala Privada
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Sala Privada 1</a></li>
            </ul>

          </li>
        </ul>

        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Comedor
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Sala 1</a></li>
            </ul>
          </li>
        </ul>
        
        <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
          <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
        </form>

      </div>
    </div>
  </div>
</nav>
    <div style="margin-top: 5%;" class="container">
        <div class="row">
            <div class="col-lg-4" style="padding-top: 82px;">
                <div class="card" >
                    <div class="card-header" style="background-color: #292E49;">
                        <h3 class="text-center" style="color: White;">Registro de Reservas</h3>
                    </div>
                    <div class="card-body" >
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Id_Mesa</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="id_mesa" id="id_mesa" placeholder="Nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Elige la fecha:</label>                                
                                <input type="date" name="fecha" id="fecha" placeholder="Fecha" class="form-control" required>
                            </div>

                            <div class="form-group">
                            <label for="sala">Elige la hora:</label>
                                <select name="hora" id="hora" placeholder="Hora" class="form-control" required>
                                    <option value="13:00:00">13:00</option>
                                    <option value="14:00:00">14:00</option>
                                    <option value="15:00:00">15:00</option>
                                    <option value="16:00:00">16:00</option>
                                    <option value="20:00:00">20:00</option>
                                    <option value="21:00:00">21:00</option>
                                    <option value="22:00:00">22:00</option>
                                    <option value="23:00:00">23:00</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="Actualizar" id="actualizar" class="btn btn-primary btn-block" style="background-color: #536976;">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div >
                        <form action="" method="post" id="frmbusqueda">
                            <div >
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                                
                                
                            </div>
                        </form>

                        <!-- <form class="d-flex" method="post" id="frmbusqueda">                          
                            <tr>
                            <th></th>
                            <th scope="col"><input class="form-control me-2" type="text" name="buscar_id" id="buscar_id" placeholder="Id..." aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="text" name="buscar_id_mesa" id="buscar_id_mesa" placeholder="Nombre" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="text" name="buscar_fecha" id="buscar_fecha" placeholder="Apellido" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="text" name="buscar_hora" id="buscar_hora" placeholder="Apellido 2" aria-label="Search"></th>
                        </form> -->
                                        
                    </div>
                </div>
                <table class="table table-hover table-resposive" style="background-color: WHITE;">
                
                    <thead style="background-color: #292E49; color: white">
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
    <script src="script.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
    <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>

  <form class="modal-content" action="../controller/crear_reserva.php"  method="POST" >
    <div class="container">
      <h1>Reserva</h1>
      <p>Elige el día y la hora</p>
      <label >Fecha:</label>
      <input type="date" id="fecha" name="fecha" required pattern="\d{4}-\d{2}-\d{2}" />
      
      <label for="sala">Elige la hora:</label>
        <select name="hora" id="hora" placeholder="Hora"  required>
            <option value="13:00:00">13:00</option>
            <option value="14:00:00">14:00</option>
            <option value="15:00:00">15:00</option>
            <option value="16:00:00">16:00</option>
            <option value="20:00:00">20:00</option>
            <option value="21:00:00">21:00</option>
            <option value="22:00:00">22:00</option>
            <option value="23:00:00">23:00</option>

        </select>
      <input id="identificador" type="hidden" name="id_table" />   

    </div>
    <input style="border-radius: 0%;" type="submit" class="btn btn-success" value="Reservar">
  </form>
</div>
</body>

</html>