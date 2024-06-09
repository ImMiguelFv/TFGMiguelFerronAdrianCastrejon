<?php include '../../controler/verificarsesion.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/login.css'>
    <script defer src="../javascript/login.js"></script>
</head>
<body>
<div id="header">
    <?php include '../recurrente/header.php'; ?>
</div> 

<div class="card">
    <h1>Cambiar Contraseña</h1>
    <form action="../../controler/cambiar.php" method="post">
        <div class="input">
            <input type="password" class="input_field" id="password_field" name='password' />
            <label class="input_label">Nueva Contraseña</label>
            <span class="input_eye" id="input_eye">
                <img id="eye_icon" src='../assets/icons/ojoCerrado.svg' alt='Icono de ojo' width='25' height='25'>
            </span>
        </div>
        <div class="input">
            <input type="password" class="input_field" id="confirm_password_field" name='confirm_password' />
            <label class="input_label">Confirmar Contraseña</label>
            <span class="input_eye" id="input_eye">
                <img id="eye_icon" src='../assets/icons/ojoCerrado.svg' alt='Icono de ojo' width='25' height='25'>
            </span>
        </div>
<!--
        <h1>Añadir o Cambiar Dirección</h1>
        <div class="input">
            <input type="text" class="input_field" id="password_field" name='direccion' />
            <label class="input_label">Direccion</label>

        </div>
-->
        <input type="submit" value="Cambiar">
    </form>
</div>
</body>
</html>
