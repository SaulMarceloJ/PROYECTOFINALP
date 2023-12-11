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
$sql = "SELECT C_STOCK, CATEGORIA, CANTIDAD_EXISTENCIA, PRECIO_COMPRA, PRECIO_VENTA, FECHA_ENTRADA, C_PRODUCTO FROM stock";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Stock</th><th>Categoría</th><th>Cantidad en Existencia</th><th>Precio de Compra</th><th>Precio de Venta</th><th>Fecha de Entrada</th><th>ID Producto</th></tr>";
    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["C_STOCK"] . "</td><td>" . $row["CATEGORIA"] . "</td><td>" . $row["CANTIDAD_EXISTENCIA"] . "</td><td>" . $row["PRECIO_COMPRA"] . "</td><td>" . $row["PRECIO_VENTA"] . "</td><td>" . $row["FECHA_ENTRADA"] . "</td><td>" . $row["C_PRODUCTO"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
