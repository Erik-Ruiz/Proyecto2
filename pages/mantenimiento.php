<?php
require_once '../components/cabecera.php';
require_once '../controller/connection.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/terraza.css" />
</head>
<br>

<div>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="./camareros.php">Mantenimiento <a class="navbar-brand" href="#">Mesas a reparar</a></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Mantenimiento</h5>
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
    <div style="margin-top: 30px;" class="mesa">
        <!-- MESA1 -->
        <div class="column-3">
            

            <div class="imagen_mesa" id="imagen">
                <?php
                $sql = "SELECT estado,id FROM tbl_mesa  WHERE estado = 'Mantenimiento'";
                $stmt=mysqli_stmt_init($conexion);
                mysqli_stmt_prepare($stmt,$sql);
                mysqli_stmt_execute($stmt);
                $resultadoconsulta=mysqli_stmt_get_result($stmt);
                $resultfa=$resultadoconsulta->fetch_all(MYSQLI_ASSOC);
                // mysqli_fetch_all($resultadoconsulta);

                ?>
            </div>
            <div class="botones">
                <?php                
                    $contmesareparada=0;
                    foreach($resultfa as $mesa){
                            if ($resultfa[$contmesareparada]['estado'] == 'Libre') {
                                echo "<img src='../img/mesaPequeLibre.png' />";
                            }else {
                                echo "<img src='../img/mesaPequeMantenimiento.png'/>";
                            }?>
                    
                            <form method="post" class="padding" action="../controller/mesa.php">
                                <input type="hidden" name="id" value="<?php echo $resultfa[$contmesareparada]['id']; ?>">    
                                <input type="submit" class="favorite styledc" value="Reparada" name="Libre" />
                                <input type='hidden' name='funcion' value='Reparado'>    
                            </form>
                            <!-- <form method="post" class="padding" action="../controller/mesa.php">
                                <input type="submit" class="favorite styledb" value="Reparar"  />
                                <input type="hidden" name="id" value="<?php echo $resultfa[$contmesa]['id']; ?>">   
                                <input type='hidden' name='funcion' value='Mantenimiento'>
                            </form> -->
                <?php $contmesareparada++; } ?>
                </div>
    </div>            
    </body>
</html>