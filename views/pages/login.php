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
        <!-- El código incluido del archivo header.html -->
        <!-- Puedes modificarlo según necesites -->
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
                <input type="password" class="input_field" name='password' required />
                <label class="input_label">Contraseña</label>
                <span class="input_eye">

                    <svg viewBox="0 0 146 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M143 37C143 45.4902 136.139 53.9606 123.263 60.487C110.554 66.9283 92.7879 71 73 71C53.2121 71 35.446 66.9283 22.7375 60.487C9.86096 53.9606 3 45.4902 3 37C3 28.5098 9.86096 20.0394 22.7375 13.513C35.446 7.07167 53.2121 3 73 3C92.7879 3 110.554 7.07167 123.263 13.513C136.139 20.0394 143 28.5098 143 37Z" stroke-width="6" />
                        <circle cx="73" cy="37" r="34" stroke-width="6" />
                    </svg>
                </span>
            </div>
            <button class="card_button" name='enviar'>Iniciar Sesión</button>
        </form>
        <div class="card_info">
            <p>No estas registrado? <a href="registro.php">Create una cuenta</a></p>
        </div>
        
    </div>
</body>
</html>
