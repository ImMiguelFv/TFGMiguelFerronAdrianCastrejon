<?php
require_once('../../controler/DB.php');
$error="";
// Comprobamos si ya se ha enviado el formulario
if (isset($_POST['enviar'])) {

    if (empty($_POST['usuario']) || empty($_POST['password'])) 
        $error = "Debes introducir un nombre de usuario y una contraseña";
    else {
        // Comprobamos las credenciales con la base de datos
        if (DB::verificaCliente($_POST['usuario'], $_POST['password'])) {
            session_start();
            $_SESSION['usuario']=$_POST['usuario'];
            header("Location: index.php");                    
        }
        else {
            // Si las credenciales no son válidas, se vuelven a pedir
            $error = "Usuario o contraseña no válidos!";
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
<header class='cabecera'>
        <div class='logo'> <a href="index.php">
            <p>3Dax</p> </a>
        </div>
        
    <nav class="menu">
        <ul class='nav-links' id='nav-links'>
            <li class="link"><a href="Deckbox.php">Deckbox</a></li>
            <li class="link"><a href="Gadgets.php">Gadgets</a></li>
            <li class="link"><a href="Llaveros.php">Llaveros</a></li>
            <li class="link"><a href="Servicio.php">Servicio de impresión </a></li>
            <li class="link"><a href="Contacto.php">CONTACTO</a></li>            <?php
            // Verificar si hay una sesión iniciada
            if (isset($_SESSION['usuario'])) {
                // Si hay una sesión iniciada, mostrar el enlace al perfil del usuario y el botón de logout
                echo "<li class='link'><a href='index.php?perfil'><svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>
                <path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
                </svg></a></li>";
                echo "<li class='link'><a href='logout.php'><svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>
                <path fill-rule='evenodd' d='M9 3a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0V4a1 1 0 0 1 1-1Zm1 4a1 1 0 0 0-1 1v13a1 1 0 0 0 2 0V8a1 1 0 0 0-1-1Zm4-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM7 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM5 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm14-4a1 1 0 0 1-1-1V4a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1Zm-1-4a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm-4-1a1 1 0 0 1 0-2 1 1 0 0 1 0 2Zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm-2-1a1 1 0 0 1 0-2 1 1 0 0 1 0 2Zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm-2-1a1 1 0 0 1 0-2 1 1 0 0 1 0 2Zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm-2-1a1 1 0 0 1 0-2 1 1 0 0 1 0 2Zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm-1 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm0 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm14-4a1 1 0 0 1-1-1V4a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1Zm-1-4a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm14-4a1 1 0 0 1-1-1V4a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1Zm-1-4a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1ZM5 23a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm14-4a1 1 0 0 1-1-1V4a1 1 0 1 1 2 0v2a1 1 0 0 1-1 1Zm-1-4a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Z' clip-rule='evenodd'/>
                </svg></a></li>";
            } else {
                // Si no hay una sesión iniciada, mostrar el enlace de iniciar sesión
                echo "<li class='link'><a href='login.php'><svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>
                <path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
                </svg></a></li>";
            }
            ?>
        </ul>
        
    </nav>
    
</header> 
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
    <h2><a href="registro.php">¿No tienes cuenta? Registrate></a></h2>
    </div>
</body>
</html>
