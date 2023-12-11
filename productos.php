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
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $proveedor_id = $_POST['proveedor_id'];

    $sql = "INSERT INTO productos (C_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, CANTIDAD_DISPONIBLE, C_PROVEEDOR) 
            VALUES ('$producto_id', '$nombre', '$descripcion', '$precio', '$cantidad', '$proveedor_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
} elseif (isset($_POST['eliminar'])) {
    $producto_id = $_POST['producto_id'];

    $sql = "DELETE FROM productos WHERE C_PRODUCTO = '$producto_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} elseif (isset($_POST['actualizar'])) {
    $producto_id = $_POST['producto_id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $proveedor_id = $_POST['proveedor_id'];

    $sql = "UPDATE productos 
            SET NOMBRE = '$nombre', DESCRIPCION = '$descripcion', PRECIO = '$precio', 
                CANTIDAD_DISPONIBLE = '$cantidad', C_PROVEEDOR = '$proveedor_id' 
            WHERE C_PRODUCTO = '$producto_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>
