<?php
require_once './components/cabecera.php';
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
    <link rel="stylesheet" href="./css/terraza.css" />
</head>
<br>

<div>

    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">Camareros Comedor 1</a>

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

    <div class="padding-top">
        <!-- MESA1 -->
        <div class="column-3">
            <h1 class="pado">Mesa1</h1>

            <div id="imagen">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen('imagen')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen1('imagen')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen2('imagen')" />
            </form>

            <script type="text/javascript" language="javascript">
                function mostrar_imagen(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                    // tiempo fin
                }

                function mostrar_imagen1(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    // tiempo inicio
                    <?php
                    function tiempoinicio()
                    {
                        $DateAndTime = date('m-d-Y h:i:s', time());
                        echo "The current date and time are $DateAndTime";
                        $sql = ("INSERT INTO tbl_tiempo (id,tiempo_inicio,tiempo_fin) VALUES (NULL,'$DateAndTime',NULL)");
                        $id = ("SELECT id from tbl_tiempo WHERE tiempo_inicio = $DateAndTime");
                    }
                    ?>
                }

                function mostrar_imagen2(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>

        <!-- MESA2 -->
        <div class="column-3">
            <h1 class="pado">Mesa2</h1>

            <div id="imagen2">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen20('imagen2')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen21('imagen2')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen22('imagen2')" />
            </form>

            <script type="text/javascript" language="javascript">
                var count = 0;

                function mostrar_imagen20(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                }

                function mostrar_imagen21(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    dom.Element.setAttribute('name', 'Ocupado1');
                    count = count + 4;
                }

                function mostrar_imagen22(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>

        <!-- MESA3 -->
        <div class="column-3">
            <h1 class="pado">Mesa3</h1>

            <div id="imagen3">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen30('imagen3')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen31('imagen3')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen32('imagen3')" />
            </form>

            <script type="text/javascript" language="javascript">
                var count = 0;

                function mostrar_imagen30(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                }

                function mostrar_imagen31(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    dom.Element.setAttribute('name', 'Ocupado1');
                    count = count + 4;
                }

                function mostrar_imagen32(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>

        <!-- MESA4 -->
        <div class="column-3">
            <h1 class="pado">Mesa4</h1>

            <div id="imagen4">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen40('imagen4')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen41('imagen4')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen42('imagen4')" />
            </form>

            <script type="text/javascript" language="javascript">
                var count = 0;

                function mostrar_imagen40(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                }

                function mostrar_imagen41(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    dom.Element.setAttribute('name', 'Ocupado1');
                    count = count + 4;
                }

                function mostrar_imagen42(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>


        <!-- MESA5 -->
        <div class="column-3">
            <h1 class="pado">Mesa5</h1>

            <div id="imagen5">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen50('imagen5')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen51('imagen5')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen52('imagen5')" />
            </form>

            <script type="text/javascript" language="javascript">
                var count = 0;

                function mostrar_imagen50(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                }

                function mostrar_imagen51(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    dom.Element.setAttribute('name', 'Ocupado1');
                    count = count + 4;
                }

                function mostrar_imagen52(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>


        <!-- MESA6 -->
        <div class="column-3">
            <h1 class="pado">Mesa6</h1>

            <div id="imagen6">
                <img src="../img/mesaPequeLibre.png" />

            </div>
            <form method="post" class="padding" action="./terraza1.php">
                <input type="button" class="favorite styledc" value="L" name="Libre" onClick="javascript:mostrar_imagen60('imagen6')" />
                <input type="button" class="favorite styleda" value="O" onClick="javascript:mostrar_imagen61('imagen6')" />
                <input type="button" class="favorite styledb" value="M" onClick="javascript:mostrar_imagen62('imagen6')" />
            </form>

            <script type="text/javascript" language="javascript">
                var count = 0;

                function mostrar_imagen60(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeLibre.png" />';
                }

                function mostrar_imagen61(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeOcupada.png" />';
                    dom.Element.setAttribute('name', 'Ocupado1');
                    count = count + 4;
                }

                function mostrar_imagen62(id) {
                    img = document.getElementById(id);
                    img.innerHTML = '<img src="../img/mesaPequeMantenimiento.png" width="480px"/> ';
                }
            </script>
        </div>



        </body>

</html>