<?php
    // El resto del HTML se mantiene igual
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="http://localhost/jdsc-ucam-pw-practicafinal/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        canvas {
            margin-left: -1%;
        }
    </style>
</head>
<body>
    <main class="container-fluid">
        <nav class="row">
            <?php 
                include_once "header.php"; 
                include_once "conexion.php"; 
            ?>  
        </nav>
        <section class="row mt-3">
            <article class="col-xl-10 col-0">
                <section class="container mt-4">
                    <h2 class="tituloProductos">Productos de la categoría: <?php echo htmlspecialchars($_GET['categoria']); ?></h2>
                    <article class="row gy-3 rowCards">
                        <?php
                            if (isset($_GET['categoria'])) {
                                $categoria = $_GET['categoria'];
                                $productos = db_connect_productos($categoria); 
                                if (count($productos) > 0) {
                                    foreach ($productos as $producto) {
                                        echo "<section class='col-lg-4 col-md-6'>";
                                        echo "<article class='card articulos'>";
                                        echo "<img src='../img/imgproductos/" . ($producto['id']) . ".png' class='card-img-top' alt='" . htmlspecialchars($producto['nombre']) . "'>";
                                        echo "<summary class='card-body d-flex flex-column'>";
                                        echo "<h5 class='card-title'>" . htmlspecialchars($producto['nombre']) . "</h5>";
                                        echo "<p class='card-text'>Precio: " . htmlspecialchars($producto['precio']) . "€</p>";
                                        echo "<form action='cesta_insertar.php' method='post'>";
                                        echo "<input type='hidden' name='producto_id' value='" . $producto['id'] . "'>";
                                        echo "<input type='hidden' name='categoria' value='" . htmlspecialchars($categoria) . "'>";
                                        echo "<button type='submit' class='btn btn-outline-dark float-end mt-auto'>Añadir a la cesta</button>";
                                        echo "</form>";
                                        echo "</summary>";
                                        echo "</article>";
                                        echo "</section>";
                                    }
                                } else {
                                    echo "<h2> No se encontraron productos en esta categoría. </h2>";
                                }
                            } else {
                                echo "<h2> Categoría no especificada. </h2>";
                            }
                        ?>
                    </article>
                </section>
            </article>
            <aside class="col-xl-2 col-lg-0 columnaAside mt-3">
                <h4 class="titulosHome">Calendario de eventos</h4>                
                <iframe class="calendario mt-2" src="https://calendar.google.com/calendar/embed?src=c_a1f63a594a1fbe3508cd7001df28b215985c2c6220e3d95b49276d8e9c7b8d37%40group.calendar.google.com&ctz=Europe%2FMadrid" style="border: 0" frameborder="0" scrolling="no"></iframe>
                <p id="map"></p>
            </aside>
        </section>
        <section class="row">
            <?php include_once "footer.php"; ?>  
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
</body>
</html>