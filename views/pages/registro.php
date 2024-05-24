<?php
require_once '../../controler/controlregistro.php';
require_once("../../modelo/DB.php");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/registro.css'>
</head>
<body>
<div id="header">

        <?php include 'header.php'; ?>
    </div> 

    <div class="card">
        <h1 class="card_title">Registrar Usuario</h1>

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
                <label class="input_label">Contraseña</label>
                
            </div>
            <div class="input">
                <input type="password" class="input_field" id="password_field" name='verificar_contraseña' required />
                <label class="input_label">Verificar Contraseña</label>
                
            </div>
            <button class="card_button" name='enviar'>Registrar</button>

        </form>
        <div class="card_info">
            <p>Ya estás registrado? <a href="login.php">Inicia Sesión</a></p>
        </div>
        <p><?php echo $mensajeError; ?></p>
    </div>







    
</body>
</html>