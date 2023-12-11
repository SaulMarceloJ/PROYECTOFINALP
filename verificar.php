<?php
// Datos de usuario para verificar
$usuario = "SAUL";
$contraseña = "admin";

// Verificar si los datos enviados coinciden
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $usuario && $password === $contraseña) {
        // Inicio de sesión exitoso, redirigir a inicio.html
        header("Location: menu.html");
        exit();
    } else {
        // Inicio de sesión fallido, redirigir a login.php
        header("Location: index.php");
        exit();
    }
}
?>
