<?php
session_start(); // Iniciar la sesión
require_once("../../modelo/DB.php");
$db_handle = new DB();

// Inicializar variables del usuario con valores por defecto
$nombre = "";
$apellido = "";
$correo = "";
$direccion = "";
$region = "";
$codigo_postal = "";
$ciudad = "";
$telefono = "";

// Verificar si hay una sesión iniciada y obtener los datos del usuario
if (isset($_SESSION['usuario'])) {
    $id = $_SESSION['id'];
    $usuario_info = $db_handle->ejecutarConsulta("SELECT * FROM usuario WHERE id = '$id'");

    if (isset($usuario_info) && is_array($usuario_info) && count($usuario_info) > 0) {
        $nombre = $usuario_info[0]["nombre"];
        $apellido = $usuario_info[0]["apellidos"];
        $correo = $usuario_info[0]["correo"];
        $direccion = $usuario_info[0]["direccion"];
        $region = $usuario_info[0]["region"];
        $codigo_postal = $usuario_info[0]["codigo_postal"];
        $ciudad = $usuario_info[0]["ciudad"];
        $telefono = $usuario_info[0]["telefono"];
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