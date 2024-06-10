<?php
include __DIR__ . '/verificarsesion.php';
include __DIR__ . '/../modelo/DB.php';



if (!isset($_SESSION['correo'])) {
    die("No has iniciado sesión.");
}

$correo = $_SESSION['correo']; // Asumiendo que el correo de usuario está almacenado en la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contraseña = $_POST['password'];
    $contraseña_verificar = $_POST['confirm_password'];


    // Intentar cambiar la contraseña
    $cambiado = DB::cambiarcontraseña($contraseña, $contraseña_verificar, $correo);
    if ($cambiado === true) {
        header("Location: ../views/pages/perfil.php");
        exit();
    } else {
        // Establecer el mensaje de error específico en la variable de sesión $_SESSION['error']
        $_SESSION['error1'] = $cambiado;
        header("Location: ../views/pages/perfil.php");
        exit();
    }

    DB::$conexion->close();
}
?>
