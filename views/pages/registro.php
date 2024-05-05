<?php
// Incluir la clase DB
require_once('../controler/DB.php');

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
        $registroExitoso = DB::registrarUsuario($nombre, $apellidos, $correo, $contraseña);
        if ($registroExitoso) {
            $mensajeError = "Usuario registrado correctamente.";
            // Limpiar los campos del formulario después de un registro exitoso
            $nombre = $apellidos = $correo = $contraseña = $verificarContraseña = "";
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
</head>
<body>
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