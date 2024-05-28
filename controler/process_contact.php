<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes agregar código para enviar el correo electrónico
    // por ejemplo, usando la función mail() de PHP o algún servicio de terceros

    // Redirigir de vuelta a la página de contacto con un mensaje de éxito
    header("Location: ../view/contact.php?status=success");
    exit();
}
?>
