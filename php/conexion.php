<!-- Conectarse a la base de datos -->
<?php
function db_connect() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "merceria";

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn->connect_error) {
        die("Imposible conectar con el servidor: " . $conn->connect_error());
    } 

    return $conn;
}
?>

<!-- Consultar la base de datos para verificar las credenciales -->
<?php
function db_verification_credentials($email, $contraseña) {
    $conn = db_connect();
    
    $sql = "SELECT id, email, nombre, apellidos, contraseña FROM usuarios WHERE email = ? AND contraseña = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $contraseña);
    $stmt->execute();
    $stmt->store_result();
    
    // Verificar si se encontró un usuario con las credenciales proporcionadas
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $email, $nombre, $apellidos, $contraseña);
        $stmt->fetch();
        
        // Devolver la información del usuario
        $user = array(
            "id" => $id,
            "email" => $email,
            "contraseña" => $contraseña,
            "nombre" => $nombre,
            "apellidos" => $apellidos
        );
    } else {
        $user = null; 
    }

    $stmt->close();
    $conn->close();

    return $user;
}
?>

<!-- Consulta para obtener las categorías  -->
<?php 
function db_connect_categorias(){
    $conn = db_connect(); 
    
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

<!-- Consulta para obtener los productos de las categorías  -->
<?php 
function db_connect_productos($categoria) {
    $conn = db_connect();
    
    $sql = "SELECT id, nombre, precio FROM productos WHERE categoria = ?";
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

<!-- Consulta para insertar y relacionar los productos con los usuarios en la tabla VENTAS  -->
<?php 
function db_connect_ventas($user_id, $producto_id, $cantidad) {
    $conn = db_connect();
    
    $sql = "INSERT INTO ventas (Id, idUsuario, idProducto, Cantidad) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        return "Error en la preparación de la consulta: " . $conn->error;
    }
    $stmt->bind_param("ssdi", $venta_id, $user_id, $producto_id, $cantidad);

    if ($stmt->execute()) {
        $result = "Producto insertado correctamente en la cesta.";
    } else {
        $result = "Error al insertar el producto en la cesta: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    return $result;
}
?>

<!-- Consulta para obtener las ventas del usuario actual -->
<?php 
function db_connect_ventas_usuario($user_id){
    $conn = db_connect(); 
    
    // Consulta para obtener las ventas del usuario actual
    $sql = "SELECT ventas.id AS id, productos.nombre AS nombre_producto, ventas.cantidad AS cantidad, productos.precio AS precio_producto
            FROM ventas
            INNER JOIN productos ON ventas.idProducto = productos.id
            WHERE ventas.idUsuario = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $ventas = array();
    
    // Obtener los resultados de la consulta
    while ($row = $result->fetch_assoc()) {
        $ventas[] = $row;
    }
    
    $stmt->close();
    $conn->close();

    return $ventas;
}
?>

<!-- Buscador de productos -->
<?php 
    function buscar_productos($query) {
        $conn = db_connect();
        $sql = "SELECT id, nombre, precio, categoria FROM productos WHERE nombre LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%" . $query . "%";
        $stmt->bind_param("s", $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $productos = array();
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
        
        $stmt->close();
        $conn->close();
        
        return $productos;
    }
?>

<!-- Actualización de cesta de productos -->
<?php 
function update_quantity($venta_id, $action) {
    $conn = db_connect();

    if ($action == 'increment') {
        $sql = "UPDATE ventas SET cantidad = cantidad + 1 WHERE id = ?";
    } elseif ($action == 'decrement') {
        $sql = "UPDATE ventas SET cantidad = GREATEST(cantidad - 1, 1) WHERE id = ?";
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $venta_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>

<!-- Borrar productos de cesta -->
<?php 
function delete_product($venta_id) {
    $conn = db_connect();

    $sql = "DELETE FROM ventas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $venta_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
?>

<!-- Confirmación de compra y borrar todos los productos de la cesta -->
<?php 
function confirm_purchase($user_id) {
    $conn = db_connect();

    $sql = "DELETE FROM ventas WHERE idUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}?>