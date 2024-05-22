<?php
include_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['venta_id'])) {
        $venta_id = $_POST['venta_id'];

        delete_product($venta_id);

        header("Location: ventas.php");
        exit;
    }
}
?>
