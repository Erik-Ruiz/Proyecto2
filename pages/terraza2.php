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
</head>

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="./camareros.php">Camareros <a class="navbar-brand" href="#">Terraza 2</a></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
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

        <?php
        $sql = "SELECT estado,id FROM tbl_mesa  WHERE id_sala=2";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_execute($stmt);
        $resultadoconsulta=mysqli_stmt_get_result($stmt);
        $resultfa=$resultadoconsulta->fetch_all(MYSQLI_ASSOC);
        // mysqli_fetch_all($resultadoconsulta);

        ?>
            <div class="mesa_botones">
                <?php                
                    $contmesa=0;
                    foreach($resultfa as $mesa){

                        if ($resultfa[$contmesa]['estado'] == 'Libre') {
                    ?>
                                
                                <div class="img_btn"> 

                                    <div class='imagen'> 
                                        <img src='../img/mesaPequeLibre.png' /> 
                                    </div>

                                    <div class="btn" style="background-color: green;">
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">    
                                            <input type="submit" class="favorite styledc" value="Libre" name="Libre" />
                                            <input type='hidden' name='funcion' value='Libre'>    
                                        </form>
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="submit" class="favorite styleda" value="Ocupar"/>
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                            <input type='hidden' name='funcion' value='Ocupado'>
                                        </form>
                                        <form method="post" class="padding" action="../controller/mesa.php">
                                            <input type="submit" class="favorite styledb" value="Reparar"  />
                                            <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                            <input type='hidden' name='funcion' value='Mantenimiento'>
                                        </form>
                                    </div>

                                </div>   
                            
                                    <?php
                                    } else if ($resultfa[$contmesa]['estado'] == 'Ocupado') {?>
                                        <div class="img_btn">

                                            <div class='imagen'>
                                              <img src='../img/mesaPequeOcupada.png' /> 
                                            </div>

                                            <div class="btn" style="background-color: red;">
                                                <form method="post" class="padding" action="../controller/mesa.php">
                                                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">    
                                                    <input type="submit" class="favorite styledc" value="Libre" name="Libre" />
                                                    <input type='hidden' name='funcion' value='Libre'>    
                                                </form>
                                                <form method="post" class="padding" action="../controller/mesa.php">
                                                    <input type="submit" class="favorite styleda" value="Ocupar"/>
                                                    <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                                    <input type='hidden' name='funcion' value='Ocupado'>
                                                </form>
                                                <form method="post" class="padding" action="../controller/mesa.php">
                                                    <input type="submit" class="favorite styledb" value="Reparar"  />
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
                        
                <?php $contmesa++; } ?>
            </div>       
    </body>
</html>