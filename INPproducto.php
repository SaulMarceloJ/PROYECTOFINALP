<?php
require('fpdf/fpdf.php');

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
$sql = "SELECT C_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, CANTIDAD_DISPONIBLE, C_PROVEEDOR FROM productos";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados y mostrarlos
if ($result->num_rows > 0) {
    $pdf = new FPDF('L'); // 'L' establece la orientación a horizontal (landscape)
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    // Título con marco de color
    $pdf->SetFillColor(200, 220, 255); // Color de fondo para el título
    $pdf->SetTextColor(0); // Color del texto
    $pdf->Cell(0, 10, 'Reporte de Productos', 1, 0, 'C', true); // Título centrado con borde y color de fondo
    $pdf->Ln(15); // Salto de línea para separar el título de la tabla

    // Encabezados de la tabla
    $pdf->Cell(30, 10, 'ID Producto', 1);
    $pdf->Cell(40, 10, 'Nombre', 1);
    $pdf->Cell(60, 10, 'Descripcion', 1);
    $pdf->Cell(30, 10, 'Precio', 1);
    $pdf->Cell(40, 10, 'Cantidad Disponible', 1);
    $pdf->Cell(30, 10, 'ID Proveedor', 1);
    $pdf->Ln();

    // Mostrar los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(30, 10, $row["C_PRODUCTO"], 1);
        $pdf->Cell(40, 10, $row["NOMBRE"], 1);
        $pdf->Cell(60, 10, $row["DESCRIPCION"], 1);
        $pdf->Cell(30, 10, $row["PRECIO"], 1);
        $pdf->Cell(40, 10, $row["CANTIDAD_DISPONIBLE"], 1);
        $pdf->Cell(30, 10, $row["C_PROVEEDOR"], 1);
        $pdf->Ln();
    }

    // Generar el archivo PDF
    $pdf->Output('D', 'reporte_productos.pdf'); // Descargar el PDF como "reporte_productos.pdf"
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
