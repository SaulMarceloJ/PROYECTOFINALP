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
$sql = "SELECT C_CLIENTE, NOMBRE, APELLIDO, DIRECCION, TELEFONO, C_PRODUCTO FROM cliente";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Cliente</th><th>Nombre</th><th>Apellido</th><th>Dirección</th><th>Teléfono</th><th>ID Producto</th></tr>";
    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["C_CLIENTE"] . "</td><td>" . $row["NOMBRE"] . "</td><td>" . $row["APELLIDO"] . "</td><td>" . $row["DIRECCION"] . "</td><td>" . $row["TELEFONO"] . "</td><td>" . $row["C_PRODUCTO"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
