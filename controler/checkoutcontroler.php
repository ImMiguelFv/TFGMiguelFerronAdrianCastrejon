<?php
session_start();
require_once("../../modelo/DB.php");
$db_handle = new DB();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['correo'])) {
        $correo = $_SESSION['correo'];
        $id_direccion = $_POST['direccion'];
        $metodo_pago = $_POST['metodo-pago'];
        $precio_total = $_SESSION['precio-total']; // Este es un ejemplo, deberías calcular el precio total según tus necesidades
        $estado = 'pendiente'; // Estado inicial del pedido

        // Insertar el pedido en la base de datos
    
        // Intentar cambiar la contraseña
        $cambiado = DB::agregarPedido($correo, $id_direccion, $precio_total, $estado) ;
           
            // Insertar los productos del carrito en la tabla detalle_pedido
            if (isset($_SESSION['cart_item'])) {
                foreach ($_SESSION['cart_item'] as $item) {
                    $cod_producto = $item['codigo'];
                    $cantidad = $item['cantidad'];
                    $precio_unitario = $item['precio'];

                    // Insertar el detalle del pedido en la tabla detalle_pedido
                    $db_handle->agregarDetallePedido($cambiado, $cod_producto, $cantidad, $precio_unitario);
                    unset($_SESSION['cart_item']);
                }
            }

            $_SESSION['error'] = $cambiado;
            header("Location: ../../views/pages/cesta.php");
            exit();
        

    }
}
?>
