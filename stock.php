<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tiendap";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejo de las operaciones
if (isset($_POST['insertar'])) {
    $stock_id = $_POST['stock_id'];
    $categoria = $_POST['categoria'];
    $cantidad_existencia = $_POST['cantidad_existencia'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $producto_id = $_POST['producto_id'];

    $sql = "INSERT INTO stock (C_STOCK, CATEGORIA, CANTIDAD_EXISTENCIA, PRECIO_COMPRA, PRECIO_VENTA, FECHA_ENTRADA, C_PRODUCTO) 
            VALUES ('$stock_id', '$categoria', '$cantidad_existencia', '$precio_compra', '$precio_venta', '$fecha_entrada', '$producto_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
} elseif (isset($_POST['eliminar'])) {
    $stock_id = $_POST['stock_id'];

    $sql = "DELETE FROM STOCK WHERE C_STOCK = '$stock_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} elseif (isset($_POST['actualizar'])) {
    $stock_id = $_POST['stock_id'];
    $categoria = $_POST['categoria'];
    $cantidad_existencia = $_POST['cantidad_existencia'];
    $precio_compra = $_POST['precio_compra'];
    $precio_venta = $_POST['precio_venta'];
    $fecha_entrada = $_POST['fecha_entrada'];
    $producto_id = $_POST['producto_id'];

    $sql = "UPDATE stock 
            SET CATEGORIA = '$categoria', CANTIDAD_EXISTENCIA = '$cantidad_existencia', 
                PRECIO_COMPRA = '$precio_compra', PRECIO_VENTA = '$precio_venta', 
                FECHA_ENTRADA = '$fecha_entrada', C_PRODUCTO = '$producto_id' 
            WHERE C_STOCK = '$stock_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>
