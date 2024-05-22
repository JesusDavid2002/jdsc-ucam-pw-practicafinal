<?php
    session_start();
    include_once "conexion.php";

    // Verifica que el usuario esté logueado
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Debes estar logueado para insertar un producto en la cesta.'); window.location.href='http://localhost/jdsc-ucam-pw-practicafinal/php/login.php';</script>";
        exit;
    }

    // Obtén la ID del usuario logueado
    $user_id = $_SESSION['user_id'];

    // Obtén los datos del formulario
    $producto_id = $_POST['producto_id'];
    
    $result = db_connect_ventas($user_id, $producto_id, 1);
    echo "<script>alert('" . $result . "'); window.location.href='http://localhost/jdsc-ucam-pw-practicafinal/php/articulos.php" . urlencode($_GET['categoria']) . "';</script>";
?>
