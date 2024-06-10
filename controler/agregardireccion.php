<?php
include __DIR__ . '/verificarsesion.php';
include __DIR__ . '/../modelo/DB.php';
// Inicializar la variable de sesión de error
$_SESSION['error'] = ""; 


if (!isset($_SESSION['correo'])) {
    die("No has iniciado sesión.");
}

$correo = $_SESSION['correo']; // Asumiendo que el ID de usuario está almacenado en la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $codigo_postal = $_POST['codigo_postal'];
    $pais = $_POST['pais'];

    
    // Intentar registrar al usuario
    $agregado = DB::agregardireccion($correo, $direccion, $ciudad, $codigo_postal, $pais);
    if ($agregado === true) {
        header("Location: ../views/pages/perfil.php");
        exit();
    } else {
        // Establecer el mensaje de error específico en la variable de sesión $_SESSION['error']
        $_SESSION['error'] = $agregado;
        header("Location: ../views/pages/perfil.php");
        exit();
    }

    DB::$conexion->close();
}
?>
