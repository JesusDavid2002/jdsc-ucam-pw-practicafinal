
<!-- <link rel="stylesheet" href="http://localhost/jdsc-ucam-pw-practicafinal/css/estilos.css"> -->
<?php 
    include_once "conexion.php"; 
    db_connect();
?>  

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <canvas id="logoCanvas" width="400" height="105"></canvas>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="http://localhost/jdsc-ucam-pw-practicafinal/php/home.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://localhost/jdsc-ucam-pw-practicafinal/php/articulos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Articulos
                </a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="http://localhost/jdsc-ucam-pw-practicafinal/php/articulos.php">Cremalleras</a></li>
                <li><a class="dropdown-item" href="#">Botones</a></li>
                <li><a class="dropdown-item" href="#">Hilos</a></li>
                </ul>
            </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
                <img src="../img/usuario-de-perfil.png" alt="PERFIL" class="perfil">    
            </form>
        </div>
    </nav>
    <nav class="mapa">
        <div id="map"></div>
    </nav>
</header>