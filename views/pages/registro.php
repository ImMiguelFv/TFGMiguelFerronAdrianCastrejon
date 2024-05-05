<?php
// Incluir la clase DB
require_once('../../controler/DB.php');

// Inicializar la variable para almacenar mensajes de error
$mensajeError = "";

// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $verificarContraseña = $_POST['verificar_contraseña'];
    // Verificar si el correo ya está registrado
    if (DB::correoRegistrado($correo)) {
        $mensajeError = "El correo electrónico ya está registrado.";
    } elseif ($contraseña !== $verificarContraseña) {
        // Verificar si las contraseñas coinciden
        $mensajeError = "Las contraseñas no coinciden.";
    } elseif (strlen($contraseña) < 8) {
        // Verificar si la contraseña es corta
        $mensajeError = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!preg_match('/[0-9]/', $contraseña) || !preg_match('/[A-Z]/', $contraseña)) {
        // Verificar si la contraseña no contiene un número o una mayúscula
        $mensajeError = "La contraseña debe contener al menos un número y una mayúscula.";
    } else {
        // Intentar registrar al usuario
        $registroExitoso = DB::registrarUsuario($nombre, $apellidos, $correo, $contraseña, $verificarContraseña);
        if ($registroExitoso) {
            header("Location: index.php");
        } else {
            $mensajeError = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
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
            <li class="link"><a href="Contacto.php">CONTACTO</a></li>
            <?php
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
    <h2>Registro de Usuario</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" required><br>
        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo isset($correo) ? $correo : ''; ?>" required><br>
        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br>
        <label for="verificar_contraseña">Verificar Contraseña:</label><br>
        <input type="password" id="verificar_contraseña" name="verificar_contraseña" required><br><br>
        <input type="submit" value="Registrar">
    </form>
    <p style="color: red;"><?php echo $mensajeError; ?></p>
</body>
</html>