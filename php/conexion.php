<?php
function db_connect() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "merceria";

    // Conectarse a la base de datos
    $conn = new mysqli($server, $user, $pass, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Imposible conectar con el servidor: " . $conn->connect_error());
    } 

    return $conn;
}
?>

<?php 
function db_connect_categorias(){
    $conn = db_connect(); 
    
    // Consulta para obtener las categorías 
    $sql = "SELECT DISTINCT categoria FROM productos";
    $result = $conn->query($sql);

    $categorias = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categorias[] = $row['categoria'];
        }
    }

    $conn->close();

    return $categorias;
}
?>

<?php 
function db_connect_productos($categoria) {
    $conn = db_connect();
    
    $sql = "SELECT id, nombre FROM productos WHERE categoria = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    
    $stmt->bind_param("s", $categoria);
    $stmt->execute();
    $result = $stmt->get_result();

    $productos = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    $stmt->close();
    $conn->close();

    return $productos;
}
?>


