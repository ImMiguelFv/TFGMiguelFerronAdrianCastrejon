<?php
session_start(); // Iniciar la sesión
require_once("../../modelo/DB.php");
$db_handle = new DB();
// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    $id = $_SESSION['id'];
    $usuario_info = $db_handle->ejecutarConsulta("SELECT * FROM usuario WHERE id = '$id'");

    // Verificar si se encontraron resultados
    if (isset($usuario_info) && is_array($usuario_info) && count($usuario_info) > 0) {
        // Obtener los datos del usuario
        $nombre = $usuario_info[0]["nombre"];
        $apellido = $usuario_info[0]["apellidos"];
        $correo = $usuario_info[0]["correo"];
        $direccion = $usuario_info[0]["direccion"];
        $region = $usuario_info[0]["region"];
        $codigo_postal = $usuario_info[0]["codigo_postal"];
        $ciudad = $usuario_info[0]["ciudad"];
        $telefono = $usuario_info[0]["telefono"];
    } else {
        // Si $usuario_info no está definido o es nulo, asignar valores por defecto o mostrar un mensaje de error
        $nombre = "";
        $apellido = "";
        $correo = "";
        $direccion = "";
        $region = "";
        $codigo_postal = "";
        $ciudad = "";
        $telefono = "";
    
    }
}

// Lógica del carrito de compras
$mensajeCarroVacio = "";
$cart_items = [];
$total_quantity = 0;
$total_price = 0;

if (isset($_SESSION["cart_item"])) {
    $cart_items = $_SESSION["cart_item"];
    foreach ($cart_items as $item) {
        $item_price = $item["cantidad"] * $item["precio"];
        $total_quantity += $item["cantidad"];
        $total_price += $item_price;
    }
} else {
    $mensajeCarroVacio = "El carro está vacío";
}
?>
