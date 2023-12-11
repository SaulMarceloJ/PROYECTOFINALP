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
    $proveedor_id = $_POST['proveedor_id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO proveedores (C_PROVEEDOR, NOMBRE, DIRECCION, TELEFONO, CORREO) 
            VALUES ('$proveedor_id', '$nombre', '$direccion', '$telefono', '$correo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar el registro: " . $conn->error;
    }
} elseif (isset($_POST['eliminar'])) {
    $proveedor_id = $_POST['proveedor_id'];

    $sql = "DELETE FROM proveedores WHERE C_PROVEEDOR = '$proveedor_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
} elseif (isset($_POST['actualizar'])) {
    $proveedor_id = $_POST['proveedor_id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE proveedores 
            SET NOMBRE = '$nombre', DIRECCION = '$direccion', TELEFONO = '$telefono', CORREO = '$correo' 
            WHERE C_PROVEEDOR = '$proveedor_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>