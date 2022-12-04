<?php
require_once '../components/cabecera.php';
require_once '../controller/connection.php';

session_start();
if(empty($_SESSION['login'])){
  echo "<script>location.href='../index.php'</script>";

  die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/terraza.css" />
    <script type="text/javascript" src="../js/modal.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../js/valid-form-reservas.js"></script> -->

</head>

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="./camareros.php">Camareros <a class="navbar-brand" href="#">Terraza 1</a></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Camareros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <a  class=" align-self-center text-center" href="../crud_ajax_reservas/index.php">
                    <button >Reservas</button>
                </a> 
                <div class="offcanvas-body align-self-center text-center">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Terrazas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./terraza1.php">Terraza 1</a></li>
                                <li><a class="dropdown-item" href="./terraza2.php">Terraza 2</a></li>
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
                                <li><a class="dropdown-item" href="#">Sala Privada 2</a></li>
                            </ul>

                        </li>
                    </ul>

                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Comedor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="comedor1">Sala 1</a></li>
                                <li><a class="dropdown-item" href="comedor2">Sala 2</a></li>
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
        <!-- LISTADO DE LAS MESAS -->
        <?php
        $sql = "SELECT estado,id FROM tbl_mesa  WHERE id_sala=1";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_execute($stmt);
        $resultadoconsulta=mysqli_stmt_get_result($stmt);
        $resultfa=$resultadoconsulta->fetch_all(MYSQLI_ASSOC);

        ?>


            <div class="mesa_botones">
                <?php
                             
                    $contmesa=0;
                    foreach($resultfa as $mesa){
                        
                        
                        if ($mesa['estado'] == 'Libre') {
                    ?>
                                
                                <div class="img_btn"> 

                                    <div class='imagen'> 
                                        <img src='../img/mesaPequeLibre.png' /> 
                                    </div>

                                    <div class="btn" style="background-color: #536976;">
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">    
                                            <input type='hidden' name='funcion' value='Libre'>  
                                        </form>
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                            <input type='hidden' name='funcion' value='Ocupado'>
                                            <input type="submit" class="favorite styleda" value="Ocupar"/>
                                        </form>
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                            <input type='hidden' name='funcion' value='Mantenimiento'>
                                            <input type="submit" class="favorite styledb" value="Reparar"  />

                                        </form>
                                           <button class="favorite styledr" onclick="abrirModal(<?php echo $mesa['id']; ?>)">Reservar</button>
                                    </div>

                                </div>   
                            
                                    <?php
                                    } else if ($resultfa[$contmesa]['estado'] == 'Ocupado') {?>
                                        <div class="img_btn">

                                            <div class='imagen'>
                                              <img src='../img/mesaPequeOcupada.png' /> 
                                            </div>

                                            <div class="btn" style="background-color: #536976;">
                                                <form method="post" class="padding" action="../controller/mesa.php">
                                                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">    
                                                    <input type="submit" class="favorite styledc" value="Liberar" name="Libre" />
                                                    <input type='hidden' name='funcion' value='Libre'>    
                                                </form>
                                                <form method="post" class="padding" action="../controller/mesa.php">
                                                    <!-- <input type="submit" class="favorite styleda" value="Ocupar"/> -->
                                                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                                    <input type='hidden' name='funcion' value='Ocupado'>
                                                </form>
                                                <form method="POST" class="padding" action="../controller/mesa.php">
                                                    <!-- <input type="submit" class="favorite styledb" value="Reparar"  /> -->
                                                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                                    <input type='hidden' name='funcion' value='Mantenimiento'>
                                                </form>
                                            </div>
                                        </div>
                        <?php
                            } else {
                                ?>
                            <div class="img_btn">
                               <div class='imagen'> <img src='../img/mesaPequeMantenimiento.png'/> </div>
                 
                            </div>
                        <?php
                            }
                        ?>

                <?php $contmesa++; }
                
                ?>
            </div>
            <html>

<body style="background-color: #BBD2C5;">

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

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);

    window.location.href.replace(window.location.search,'');

  if(urlParams.has('error'))
    Swal.fire({
        icon: 'error',
        title: 'Mesa Reservada',
        showConfirmButton: false,
        timer: 1500
    })
    if(urlParams.has('fechamal'))
    Swal.fire({
        icon: 'error',
        title: 'Fecha Incorrecta',
        showConfirmButton: false,
        timer: 1500
    })
</script>

</body>
</html>   

    </body>
</html>