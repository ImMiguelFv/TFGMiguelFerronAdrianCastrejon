<?php
require_once '../../controler/controlregistro.php';
require_once("../../modelo/DB.php");


// pagina_error.php
session_start();

// Recoger la variable de error de la sesión
$error = isset($_SESSION['error']) ? $_SESSION['error'] : "";
// Limpiar el mensaje de error después de mostrarlo
unset($_SESSION['error']);
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
    <script>
        console.log($error);
        </script>
    <?php if ($error): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
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
                <input type="password" class="input_field" id="password_field_check" name='verificar_contraseña' required />
                <label class="input_label">Verificar Contraseña</label>
                
            </div>
            <button class="card_button" name='enviar'>Registrar</button>

            

        </form>
        <div class="card_info">
            <p>Ya estás registrado? <a href="login.php">Inicia Sesión</a></p>
        </div>
        
    </div>







    
</body>
</html>