<?php
require_once('../../modelo/DB.php');
$error="";
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

    if (empty($_POST['correo']) || empty($_POST['password'])) 
        $error = "Debes introducir un correo y una contraseña";
    else {
        // Comprobamos las credenciales con la base de datos
        if (DB::verificaCliente($_POST['correo'], $_POST['password']) ) {
            session_start();
            $_SESSION['correo']=$_POST['correo'];
            header("Location: index.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Correo o contraseña no válidos! " . $_POST['correo'] . $_POST['password'];
    
        }
    }
}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ejemplo Tema 7: Login Tienda Web</title>
<link rel='stylesheet' type='text/css' media='screen' href='../styles/login.css'>

</head>

<body id='cuerpo'>
<div id="header">
        <?php include 'header.php'; ?>
    </div>
    <div class="card">
        <h1 class="card_title">Iniciar Sesión</h1>

        <form class="card_form" action='login.php' method='post'>
            
            <div class="input">
                <input type="text" class="input_field" name='correo' required />
                <label class="input_label">Correo</label>
            </div>
            <div class="input">
                <input type="password" class="input_field" id="password_field" name='password' required />
                <label class="input_label">Contraseña</label>
                <span class="input_eye" id="input_eye">

                    <img  id="eye_icon" src='../assets/icons/ojoCerrado.svg' alt='Icono de ojo' width='25' height='25'>
                </span>
            </div>
            <button class="card_button" name='enviar'>Iniciar Sesión</button>
        </form>
        <div class="card_info">
            <p>No estás registrado? <a href="registro.php">Create una cuenta</a></p>
        </div>
        
    </div>
    <script src="../javascript/login.js"></script>
</body>
</html>
