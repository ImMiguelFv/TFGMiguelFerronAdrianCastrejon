<?php
require_once '../../controler/cestacontroler.php';

$correo = $_SESSION['correo'];
$nombre = DB::obtenerNombre($correo);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/cesta.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>
<body class='cuerpo'>
<!-- Incluyendo el header -->
<div id="header">
    <?php include '../recurrente/header2.php'; ?>
</div>

<div id="shopping-cart">
    <div class="txt-heading">Carro</div>

    <a id="btnEmpty" href="deckbox.php?action=empty">Vaciar</a>
    <?php if(!empty($cart_items)) { ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
            <th style="text-align:left;">Nombre</th>
            <th style="text-align:right;" width="5%">Cantidad</th>
            <th style="text-align:right;" width="10%">Precio unidad</th>
            <th style="text-align:right;" width="10%">Precio</th>
            <th style="text-align:center;" width="5%">Quitar</th>
        </tr>
        <?php foreach ($cart_items as $item) { ?>
            <tr>
                <td><img src="<?php echo $item["imagen"]; ?>" class="cart-item-image" /><?php echo $item["nombre"]; ?></td>
                <td style="text-align:right;"><?php echo $item["cantidad"]; ?></td>
                <td style="text-align:right;"><?php echo "$ ".$item["precio"]; ?></td>
                <td style="text-align:right;"><?php echo "$ ".number_format($item["cantidad"] * $item["precio"], 2); ?></td>
                <td style="text-align:center;"><a href="deckbox.php?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="../assets/icons/trash.svg" alt="Remove Item" width="20" height="20"/></a></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="2" align="right">Total:</td>
            <td align="right"><?php echo $total_quantity; ?></td>
            <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
            <td></td>
        </tr>
        </tbody>
        </table>
        <button class="boton-grande"><a href="checkout.php">Finalizar Pedido!</a></button>
    <?php } else { ?>
        <div class="no-records"><?php echo $mensajeCarroVacio; ?></div>
    <?php } ?>
</div>

<div class="pedidos">
    <h1><?php echo htmlspecialchars($nombre); ?> estos son tus pedidos: </h1>
    <?php
    // Obtener todos los pedidos del usuario
    $pedidos = $db_handle->ejecutarConsulta("SELECT * FROM pedido WHERE correo_usuario = '$correo'");
    if (!empty($pedidos)) {
        // Mostrar los pedidos
        foreach ($pedidos as $pedido) {
            echo '<div class="card">' ;
            // Mostrar información del pedido
            echo "<p>ID del Pedido: " . htmlspecialchars($pedido['id']) . "</p>";
            echo "<p>Precio Total: $" . htmlspecialchars($pedido['precio_total']) . "</p>";
            
            // Obtener los productos asociados al pedido
            $id_pedido = $pedido['id'];
            $detalle_pedidos = $db_handle->ejecutarConsulta("SELECT p.nombre AS nombre_producto, dp.cantidad, dp.precio_unitario, pd.precio_total
                                                                FROM detalle_pedido AS dp
                                                                JOIN producto AS p ON dp.cod_producto = p.codigo
                                                                JOIN pedido AS pd ON dp.id_pedido = pd.id
                                                                WHERE dp.id_pedido = $id_pedido;");

            // Mostrar los productos asociados al pedido
            if (!empty($detalle_pedidos)) {
                echo "<ul>";
                foreach ($detalle_pedidos as $detalle_pedido) {
                    echo "<li>" . htmlspecialchars($detalle_pedido['nombre_producto']) . " ". htmlspecialchars($detalle_pedido['cantidad']) ."</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No se encontraron productos para este pedido.</p>";
            }
            echo '</div>';
        }
    } else {
        echo "<p>No se encontraron pedidos para este usuario.</p>";
    }
    ?>
</div>


</body>
</html>
