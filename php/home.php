<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PracticaFinalPW</title>
    <link rel="stylesheet" href="../css/estilos.css">
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
            <?php include_once "header.php"; ?>  
        </nav>
        <section class="row">
            <!-- <aside class="col-md-3 col-sm-2"></aside> -->
            <section class="col-12 carouselhome">
                <article id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <!-- <h3 class="p-3">Mercería La Ilusión</h3> -->
                    <figure class="carousel-inner carouselimghome">
                        <span class="carousel-item active">
                            <img src="../img/escaparate.PNG" class="d-block w-100 carouselimghome" alt="Mostrador">
                        </span>
                        <span class="carousel-item">
                            <img src="../img/mostrador.PNG" class="d-block w-100 carouselimghome" alt="Cremalleras">
                        </span>
                        <span class="carousel-item">
                            <img src="../img/ropainfantiltienda.PNG" class="d-block w-100 carouselimghome" alt="Ropa Interior">
                        </span>
                        <span class="carousel-item">
                            <img src="../img/productosmerceria.PNG" class="d-block w-100 carouselimghome" alt="Ropa Interior">
                        </span>
                    </figure>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </article>      
            </section>
            <section class="col-xl-9 col-lg-11 col-md-11 col-sm-8 mt-5">
                <h4 class="mb-5 titulosHome">MAYORES TENDENCIAS</h4>
                <article>
                    <section class="card-group gap-3 mt-3 rowCardsHome">
                        <a href="./productos.php?categoria=ropainfantil"> 
                            <article class="card cardHome ms-5 mt-3">
                                <div class="card-body">
                                    <img src="../img/modainfantil1.png" class="card-img-top imgCard" alt="moda infantil">
                                    <h5 class="card-title tituloCard">Ropa Infantil</h5>
                                </div>
                            </article>
                        </a>
                        <a href="./productos.php?categoria=lenceria"> 
                            <article class="card cardHome ms-5 mt-3">
                                <div class="card-body">
                                    <img src="../img/prueba5.png" class="card-img-top imgCard" alt="lenceria">
                                    <h5 class="card-title tituloCard text-center">Lencería</h5>
                                </div>
                            </article>
                        </a>
                        <a href="./productos.php?categoria=botones"> 
                            <article class="card cardHome ms-5 mt-3">
                                <div class="card-body">
                                    <img src="../img/botones.png" class="card-img-top imgCard" alt="botones">
                                    <h5 class="card-title tituloCard text-center">Botones</h5>
                                </div>
                            </article>
                        </a>
                        <a href="./productos.php?categoria=cremalleras"> 
                            <article class="card cardHome ms-5 mt-3">
                                <div class="card-body">
                                    <img src="../img/cremalleras.png" class="card-img-top imgCard" alt="cremalleras">
                                    <h5 class="card-title tituloCard text-center">Cremalleras</h5>
                                </div>
                            </article>
                        </a>
                    </section>
                    <section>
                        <h3 class="mt-5 titulosHome">Descripción</h3>
                        <p class="ms-5 mt-3">Mercería de barrio con mucha experiencía en el sector, dentro de nuestro amplio catálogo <strong>disponemos</strong> de estos <strong>productos:</strong></p>
                        <p class="ms-5 mt-4"><strong>Material de merceria:</strong></p>
                        <ul class="ms-5">
                            <li>Botones</li>
                            <li>Cremalleras</li>
                            <li>Agujas</li>
                            <li>Cremalleras</li>
                        </ul>
                        <p class="ms-5 mt-3"><strong>Moda:</strong></p>
                        <ul class="ms-5">
                            <li>Ropa infantil</li>
                            <li>Lencería de mujer</li>
                            <li>Ropa interior de hombre</li>
                            <li>Prendas de primera puesta</li>
                        </ul>
                        <p class="ms-5 mt-3">Además disponemos de la capacidad de realizar <strong>distintos tipos de arreglos</strong> a diversas prendas de ropa. </p>
                    </section>
                </article>
            </section>
            <aside class="col-xl-1 col-lg-0"></aside>
            <aside class="col-xl-2 col-lg-0 columnaAside mt-3">
                <h4 class="titulosHome">Calendario de eventos</h4>
                <iframe class="calendario mt-2" src="https://calendar.google.com/calendar/embed?src=c_a1f63a594a1fbe3508cd7001df28b215985c2c6220e3d95b49276d8e9c7b8d37%40group.calendar.google.com&ctz=Europe%2FMadrid" style="border: 0" frameborder="0" scrolling="no"></iframe>
            </aside>
        </section>
        <section class="row">
            <?php include_once "mapa.php"; ?>  
            <?php include_once "footer.php"; ?>  
        </section>
    </main>
    
    <!-- Referencias a archivos JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    
</body>
</html>