<?php
require_once('../../modelo/DB.php');
$error="";
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

    if (empty($_POST['usuario']) || empty($_POST['password'])) 
        $error = "Debes introducir un nombre de usuario y una contraseña";
    else {
        // Comprobamos las credenciales con la base de datos
        if (($usuario_id = DB::verificaCliente($_POST['usuario'], $_POST['password'])) !== false) {
            session_start();
            $_SESSION['usuario']=$_POST['usuario'];
            $_SESSION['id']=$usuario_id;
            header("Location: index.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Usuario o contraseña no válidos! " . $_POST['usuario'] . $_POST['password'];
    
        }
    }
}
?>
<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Ejemplo Tema 7: Login Tienda Web</title>
<link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>

<body>
<div id="header">
        <!-- El código incluido del archivo header.html -->
        <!-- Puedes modificarlo según necesites -->
        <?php include 'header.php'; ?>
    </div>
    <div id='login'>
    <form action='login.php' method='post'>
        <legend>Login</legend>
        <div><span class='error'><?php echo $error; ?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </form>
    <h2><a href="registro.php">¿No tienes cuenta? Registrate</a></h2>
    </div>
</body>
</html>
