<?php
// Verificar si una sesión ya está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    // Si hay una sesión iniciada y se hace clic en el enlace del perfil, redirigir al perfil del usuario
    if (isset($_GET['perfil'])) {
        header("Location: perfil.php");
        exit(); // Asegura de detener la ejecución del resto del código
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
