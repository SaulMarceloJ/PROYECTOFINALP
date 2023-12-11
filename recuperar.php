<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Correo del usuario que solicita la recuperación
    $email = $_POST['email'];

    // Datos del administrador (cambiar por los datos reales del administrador)
    $admin_email = 'saulmarce12@gmail.com';
    $admin_subject = 'Solicitud de recuperación de contraseña';
    $admin_message = 'El usuario con el correo ' . $email . ' ha solicitado recuperar su contraseña.';

    // Envío del correo al administrador
    $headers = 'From: ' . $email . '\r\n';
    mail($admin_email, $admin_subject, $admin_message, $headers);

    // Redirigir a una página de confirmación o a la página principal
    header("Location: index.php"); // Cambiar a la página deseada
    exit();
}
?>
