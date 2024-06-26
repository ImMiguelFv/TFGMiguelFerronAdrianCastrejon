<?php include '../../controler/verificarsesion.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax - Contacto</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/contacto.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>
<body>
    <div id="header">
        <!-- El código incluido del archivo header.php -->
        <?php include '../recurrente/header.php'; ?>
    </div>

    <div id="content">
        <h1>Contacto</h1>
        
        <!-- Formulario de contacto -->
        <form id="contactForm" action="3DAX">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="subject">Asunto:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit" class="button" name="submit">Enviar</button>
        </form>
        </div>
        <!-- Información de contacto adicional -->
        <div id="additional-contact">
            <h2>Contacto Adicional</h2>
            <p>Correo electrónico: <a href="mailto:contacto@3dax.com">contacto@3dax.com</a></p>
        </div>

        <!-- Redes sociales -->
        <div id="social-media">
            <h2>Síguenos en nuestras redes sociales</h2>
            <ul>
                <li><a href="https://facebook.com/3dax" target="_blank">Facebook</a></li>
                <li><a href="https://twitter.com/3dax" target="_blank">Twitter</a></li>
                <li><a href="https://www.instagram.com/3dax.official/" target="_blank">Instagram</a></li>
            </ul>
        </div>
    
        <?php include '../recurrente/menu_cesta.php'; ?>
<script src="../javascript/contacto.js"></script>
</body>
</html>
