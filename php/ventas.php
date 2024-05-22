<?php
    session_start();
    include_once "conexion.php";

    $user_id = $_SESSION['user_id'];
    $ventas = db_connect_ventas_usuario($user_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container mt-5">
        <h2>Ventas del Usuario</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID Venta</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ventas as $venta) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($venta['id']); ?></td>
                        <td><?php echo htmlspecialchars($venta['nombre_producto']); ?></td>
                        <td>
                            <form action="cesta_actualizar.php" method="post" class="d-inline">
                                <input type="hidden" name="venta_id" value="<?php echo htmlspecialchars($venta['id']); ?>">
                                <button type="submit" name="action" value="decrement" class="btn btn-danger btn-sm">-</button>
                                <?php echo htmlspecialchars($venta['cantidad']); ?>
                                <button type="submit" name="action" value="increment" class="btn btn-success btn-sm">+</button>
                            </form>
                        </td>
                        <td>
                            <form action="cesta_borrar.php" method="post" class="d-inline">
                                <input type="hidden" name="venta_id" value="<?php echo htmlspecialchars($venta['id']); ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <form>
            <a href="home.php" class="btn btn-secondary">Volver al Home</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Confirmar Compra</button>
        </form>
    </main>

    <!-- Modal de confirmación compra -->
    <main class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmar Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Está seguro de que desea realizar esta compra?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="confirmPurchaseButton">Sí</button>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        document.getElementById('confirmPurchaseButton').addEventListener('click', function () {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "cesta_borrarTodo.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert('Compra confirmada. Será redirigido al home en 5 segundos.');
                        setTimeout(function() {
                            window.location.href = 'home.php';
                        }, 5000);
                    } else {
                        alert('Hubo un error al confirmar la compra. Por favor, inténtelo de nuevo.');
                    }
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
