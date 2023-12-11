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
$sql = "SELECT * FROM ventas";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Venta</th><th>Fecha</th><th>Producto</th><th>Precio del Producto</th><th>Total</th><th>ID Cliente</th></tr>";
    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["C_VENTA"] . "</td><td>" . $row["FECHA"] . "</td><td>" . $row["PRODUCTO"] . "</td><td>" . $row["PRECIO_PRODUCTO"] . "</td><td>" . $row["TOTAL"] . "</td><td>" . $row["C_CLIENTE"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
