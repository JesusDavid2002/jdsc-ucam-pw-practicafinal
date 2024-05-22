<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PracticaFinalPW</title>
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
                $categorias = db_connect_categorias();
            ?>  
        </nav>
        <section class="row mt-3">
            <article class="col-xl-10 col-0">
                <section class="container mt-4">
                    <article class="row gy-3 rowCards">
                        <?php foreach ($categorias as $categoria): ?>
                            <section class="col-lg-4 col-md-6">
                                <article class="card columnas" >
                                    <img src="../img/<?php echo $categoria; ?>.png" class="card-img-top" alt="<?php echo $categoria; ?>">
                                    <summary class="card-body d-flex flex-column">
                                        <h5 class="card-title"><?php echo $categoria; ?></h5>
                                        <p class="card-text">Productos de la categoría <?php echo $categoria; ?>.</p>
                                        <a href="./productos.php?categoria=<?php echo urlencode($categoria); ?>"
                                            class="btn btn-outline-dark float-end mt-auto">Ver productos</a>
                                    </summary>
                                </article>
                            </section>
                        <?php endforeach; ?>
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