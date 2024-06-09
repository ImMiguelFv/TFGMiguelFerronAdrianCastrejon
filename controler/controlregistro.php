<?php
// Incluir la clase DB
require_once("../../modelo/DB.php");

session_start(); // Iniciar la sesión al comienzo del archivo

// Inicializar la variable de sesión de error
$_SESSION['error'] = ""; 

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
        $_SESSION['error'] = "El correo electrónico ya está registrado.";
    } elseif ($contraseña !== $verificarContraseña) {
        // Verificar si las contraseñas coinciden
        $_SESSION['error'] = "Las contraseñas no coinciden.";
    } elseif (strlen($contraseña) < 8) {
        // Verificar si la contraseña es corta
        $_SESSION['error'] = "La contraseña debe tener al menos 8 caracteres.";
    } elseif (!preg_match('/[0-9]/', $contraseña) || !preg_match('/[A-Z]/', $contraseña)) {
        // Verificar si la contraseña no contiene un número o una mayúscula
        $_SESSION['error'] = "La contraseña debe contener al menos un número y una mayúscula.";
    } else {
        // Intentar registrar al usuario
        $registroExitoso = DB::registrarUsuario($nombre, $apellidos, $correo, $contraseña);
        if ($registroExitoso) {
            header("Location: login.php");
            exit();
        } else {
            $_SESSION['error'] = "Error al registrar el usuario. Por favor, inténtalo de nuevo.";
        }
    }
}
?>
