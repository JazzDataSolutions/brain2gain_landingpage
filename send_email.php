<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    if (!empty($name) && !empty($email) && !empty($message)) {
        
        $to = "contacto@brain2gain.mx";

        
        $subject = "Nuevo mensaje de contacto de $name";

        
        $body = "Has recibido un nuevo mensaje de contacto:\n\n";
        $body .= "Nombre: $name\n";
        $body .= "Correo: $email\n";
        $body .= "Mensaje:\n$message\n";

        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        
        if (mail($to, $subject, $body, $headers)) {
            echo "<script>alert('Mensaje enviado con éxito. ¡Gracias por contactarnos!'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Por favor, completa todos los campos del formulario.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Método de solicitud no válido.'); window.history.back();</script>";
}
?>
