<?php
include __DIR__ . '/verificarsesion.php';
include __DIR__ . '/../model/DB.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    die("No has iniciado sesión.");
}

$user_id = $_SESSION['user_id']; // Asumiendo que el ID de usuario está almacenado en la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $new_direccion = $_POST['direccion'];

    // Validar la contraseña
    if ($new_password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $new_password)) {
        die("La contraseña debe tener al menos 8 caracteres, una mayúscula y un número.");
    }

    // Actualizar la contraseña
    if (!empty($new_password)) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $consulta_password = "UPDATE Usuario SET contraseña = '$hashed_password' WHERE id = $user_id";
        
        DB::conectar();
        if (DB::$conexion->query($consulta_password) === TRUE) {
            echo "Contraseña actualizada correctamente.";
        } else {
            echo "Error al actualizar la contraseña: " . DB::$conexion->error;
        }
    }

    // Validar y actualizar la dirección
    if (!empty($new_direccion)) {
        $consulta_direccion = "UPDATE Usuario SET direccion = '$new_direccion' WHERE id = $user_id";
        
        if (DB::$conexion->query($consulta_direccion) === TRUE) {
            echo "Dirección actualizada correctamente.";
        } else {
            echo "Error al actualizar la dirección: " . DB::$conexion->error;
        }
    }

    DB::$conexion->close();
}
?>