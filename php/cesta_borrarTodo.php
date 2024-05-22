<?php
session_start();
include_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        confirm_purchase($user_id);

        echo "Compra confirmada";
        exit;
    }
}
?>
