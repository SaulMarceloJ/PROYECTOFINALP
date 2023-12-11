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
    $cliente_id = $_POST['cliente_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $producto_id = $_POST['producto_id'];

    $sql = "INSERT INTO cliente (C_CLIENTE, NOMBRE, APELLIDO, DIRECCION, TELEFONO, C_PRODUCTO) 
            VALUES ('$cliente_id', '$nombre', '$apellido', '$direccion', '$telefono', '$producto_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
} elseif (isset($_POST['eliminar'])) {
    $cliente_id = $_POST['cliente_id'];

    $sql = "DELETE FROM cliente WHERE C_CLIENTE = '$cliente_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} elseif (isset($_POST['actualizar'])) {
    $cliente_id = $_POST['cliente_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $producto_id = $_POST['producto_id'];

    $sql = "UPDATE cliente 
            SET NOMBRE = '$nombre', APELLIDO = '$apellido', DIRECCION = '$direccion', 
                TELEFONO = '$telefono', C_PRODUCTO = '$producto_id' 
            WHERE C_CLIENTE = '$cliente_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>
