<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $email = htmlspecialchars($_POST['email']);
    $experiencia = htmlspecialchars($_POST['experiencia']);
    $conocimientos = htmlspecialchars($_POST['conocimientos']);
    $capital = htmlspecialchars($_POST['capital']);
    $comunidad = htmlspecialchars($_POST['comunidad']);

    // Dirección de correo donde se enviarán los datos
    $to = "revolutioncomunityy@gmail.com";
    $subject = "Nuevo Registro en REVOLUTION";
    
    // Contenido del mensaje
    $message = "Has recibido un nuevo registro en REVOLUTION.\n\n";
    $message .= "Nombre: " . $nombre . "\n";
    $message .= "Apellido: " . $apellido . "\n";
    $message .= "Teléfono: " . $telefono . "\n";
    $message .= "Correo Electrónico: " . $email . "\n\n";
    $message .= "Experiencia en Trading: " . $experiencia . "\n";
    $message .= "Conocimientos sobre Trading: " . $conocimientos . "\n";
    $message .= "Capital para Fondear: " . $capital . "\n";
    $message .= "Parte de una Comunidad de Trading: " . $comunidad . "\n";

    // Cabeceras del correo
    $headers = "From: no-reply@revolution.com\r\n";
    $headers .= "Reply-To: no-reply@revolution.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        // Redireccionar a una página de agradecimiento
        header("Location: thank_you.html");
        exit();
    } else {
        // Si el correo no se pudo enviar, mostrar un mensaje de error
        echo "Error al enviar el correo. Por favor, intenta nuevamente.";
    }
} else {
    // Si se intenta acceder al script directamente, redirigir a la página principal
    header("Location: index.html");
    exit();
}
?>
