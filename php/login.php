<!-- Nos conectamos a la bbdd y verificamos si el usuario está en la bbdd o no, si está accederá al home -->
<?php
session_start();
include_once "conexion.php"; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['contraseña'])) {
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        
        $user = db_verification_credentials($email, $contraseña);
        if ($user !== null) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['apellidos'] = $user['apellidos'];
            header("Location: http://localhost/jdsc-ucam-pw-practicafinal/php/home.php"); 
            exit;
        } else {
            $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
        }
    } else {
        $error_message = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container pt-5 mt-5">
        <section class="row d-flex justify-content-center align-items-center h-100 mt-5">
            <article class="col col-xl-10">
                <section class="card">
                    <article class="row g-0">
                        <aside class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="../img/loginIMG.png" alt="login form" class="img-fluid" />
                        </aside>    
                        <article class="col-md-6 col-lg-7 d-flex align-items-center">
                            <section class="card-body p-4 p-lg-5 text-black">
                                <article class="container mt-4">
                                    <h2 class="tituloLogin mb-5">Iniciar Sesión </h2>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <?php if (isset($error_message)) { ?>
                                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                                        <?php } ?>
                                        <div class="mb-3">
                                        <label for="email" class="form-label">Email:</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                        <label for="password" class="form-label">Contraseña:</label>
                                        <input type="password" id="contraseña" name="contraseña" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </form>
                                </article>
                                <article class="pt-4">
                                    <a href="#!" class="small text-muted">Terminos de uso.</a>
                                    <a href="#!" class="small text-muted">Politicas de privacidad</a>
                                </article>
                            </section>
                        </article>
                    </article>
                </section>
            </article>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+FfKQtX6pHGWlZjN8MBr+1W1SOh2v" crossorigin="anonymous"></script>
</body>
</html>
