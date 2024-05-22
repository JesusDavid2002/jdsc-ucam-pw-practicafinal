<?php
include_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['venta_id']) && isset($_POST['action'])) {
        $venta_id = $_POST['venta_id'];
        $action = $_POST['action'];

        update_quantity($venta_id, $action);

        header("Location: ventas.php");
        exit;
    }
}
?>
