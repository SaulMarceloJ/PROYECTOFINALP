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

// Consulta SQL para obtener las ventas de los productos
$sql = "SELECT * FROM ventas";

// Ejecutar la consulta
$result = $conn->query($sql);

// Iniciar el objeto FPDF
$pdf = new FPDF('L'); // Orientación horizontal

// Agregar página al PDF
$pdf->AddPage();

// Definir fuente y tamaño para el texto principal
$pdf->SetFont('Arial', '', 12);

// Título
$pdf->SetFillColor(200, 220, 255); // Color de fondo para el título
$pdf->SetTextColor(0); // Color del texto
$pdf->Cell(0, 10, 'Tecnologico de Estudios Superiores de Jocotitlan', 1, 1, 'C', true); // Subtítulo centrado con borde y color de fondo
$pdf->Cell(0, 10, 'Sistema Web Papeleria', 1, 1, 'C', true); // Subtítulo centrado con borde y color de fondo
$pdf->Ln(15); // Salto de línea para separar el título del contenido

// Subtítulos
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(180, 200, 255); // Color de fondo para los subtítulos
$pdf->Cell(0, 10, 'Nota de Venta', 1, 0, 'C', true); // Título centrado con borde y color de fondo
$pdf->Ln(15); // Salto de línea para separar el título del contenido

// Encabezados de la tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(150, 180, 255); // Color de fondo para la primera fila de la tabla
$pdf->Cell(25, 10, 'ID Venta', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'Fecha', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Producto', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Precio del Producto', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Total', 1, 0, 'C', true);
$pdf->Cell(25, 10, 'ID Cliente', 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 10);

// Mostrar los datos de cada fila
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(25, 10, $row["C_VENTA"], 1, 0, 'C');
    $pdf->Cell(25, 10, $row["FECHA"], 1, 0, 'C');
    $pdf->Cell(60, 10, $row["PRODUCTO"], 1, 0, 'C');
    $pdf->Cell(40, 10, $row["PRECIO_PRODUCTO"], 1, 0, 'C');
    $pdf->Cell(30, 10, $row["TOTAL"], 1, 0, 'C');
    $pdf->Cell(25, 10, $row["C_CLIENTE"], 1, 1, 'C');
}

// Generar el archivo PDF
$pdf->Output('D', 'nota_de_venta.pdf'); // Descargar el PDF como "nota_de_venta.pdf"

// Cerrar conexión
$conn->close();
?>
