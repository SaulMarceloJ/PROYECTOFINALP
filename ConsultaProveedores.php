<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
$password = ""; // Reemplaza con tu contraseña de la base de datos
$dbname = "tiendap";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT C_PROVEEDOR, NOMBRE, DIRECCION, TELEFONO, CORREO FROM proveedores";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Proveedor</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Correo</th></tr>";
    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["C_PROVEEDOR"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["DIRECCION"] . "</td><td>" . $row["TELEFONO"] . "</td><td>" . $row["CORREO"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
