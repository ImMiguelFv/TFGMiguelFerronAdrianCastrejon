<?php

require_once ('../../controler/controlregistro.php');
require_once("../../modelo/DB.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/registro.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>
<body>
<div id="header">
    <?php include '../recurrente/header.php'; ?>
</div> 

<div class="card">
    <h1 class="card_title">Registrar Usuario</h1>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (!empty($_SESSION['error'])): ?>
        <p><?php echo htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form class="card_form" action='registro.php' method='post'>
        <div class="input">
            <input type="text" class="input_field" name='nombre' required />
            <label class="input_label">Nombre</label>
        </div>
        <div class="input">
            <input type="text" class="input_field" name='apellidos' required />
            <label class="input_label">Apellidos</label>
        </div>
        <div class="input">
            <input type="email" class="input_field" name='correo' required />
            <label class="input_label">Correo</label>
        </div>
        <div class="input">
            <input type="password" class="input_field" id="password_field" name='contraseña' required />
<<<<<<< HEAD
            <label class="input_label">Contraseña</label>
            <span class="input_eye" id="input_eye">
=======
            <label class="input_label">Contraseña</label> <span class="input_eye" id="input_eye">
>>>>>>> bc34b735706fd585f9944d7aa484ec7a9a9b11e6
                <img  id="eye_icon" src='../assets/icons/ojoCerrado.svg' alt='Icono de ojo' width='25' height='25'>
            </span>
        </div>
        <div class="input">
            <input type="password" class="input_field" id="password_field_check" name='verificar_contraseña' required />
            <label class="input_label">Verificar Contraseña</label> 
        </div>
        <button class="card_button" name='enviar'>Registrar</button>
    </form>
    <div class="card_info">
        <p>¿Ya estás registrado? <a href="login.php">Inicia Sesión</a></p>
    </div>
</div>
<script src="../javascript/login.js"></script>
</body>
</html>
