
<!-- <link rel="stylesheet" href="http://localhost/jdsc-ucam-pw-practicafinal/css/estilos.css"> -->
<?php 
    session_start();
    include_once "conexion.php"; 
    db_connect();
?>  

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <canvas id="logoCanvas" width="400" height="105" class="ps-2 pb-3"></canvas>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <section class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/jdsc-ucam-pw-practicafinal/php/home.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/jdsc-ucam-pw-practicafinal/php/articulos.php">Articulos</a>
            </li>
            </ul>
            <form class="d-flex pe-4" role="search" action="http://localhost/jdsc-ucam-pw-practicafinal/php/buscador.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" name="query" id="buscador">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <?php 
                    if (isset($_SESSION['user_id'])) {
                        echo "<a href='http://localhost/jdsc-ucam-pw-practicafinal/php/ventas.php' >";
                        echo "    <img src='http://localhost/jdsc-ucam-pw-practicafinal/img/cesta-de-la-compra.png' alt='Cesta' class='ps-3'>";
                        echo "</a>";
                        echo "<li class='dropdown d-grid'>";
                        echo "    <a class='dropdown-toggle d-grid' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                        echo "       <article class='d-flex'>";
                        echo "          <img src='http://localhost/jdsc-ucam-pw-practicafinal/img/usuario-de-perfil.png' alt='PERFIL' class='ps-3'>";
                        echo "          <span class='dropdown-item ms-2'>" . htmlspecialchars($_SESSION['nombre']) . " " . htmlspecialchars($_SESSION['apellidos']) . "</span>"; 
                        echo "       </article>";
                        echo "    </a>";
                        echo "    <ul class='dropdown-menu dropdown-menu-end mt-2'>";
                        echo "        <li><a class='dropdown-item' href='http://localhost/jdsc-ucam-pw-practicafinal/php/logout.php'>Cerrar sesión</a></li>";
                        echo "    </ul>";
                        echo "</li>";
                    } else {
                        echo "<a href='http://localhost/jdsc-ucam-pw-practicafinal/php/login.php' class='btn btn-outline-success'>Iniciar Sesión</a>";
                    }
                ?>                
            </form>
        </section>
    </nav>
</header>