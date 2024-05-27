<?php
require_once '../../controler/cestacontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/cesta.css'>
</head>
<body class='cuerpo'>
<!-- Incluyendo el header -->
<div id="header">
    <?php include '../recurrente/header.php'; ?>
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
    <?php } else { ?>
        <div class="no-records"><?php echo $mensajeCarroVacio; ?></div>
    <?php } ?>
</div>

<button class="boton-grande"><a href="checkout.php">Finalizar Pedido!</a></button>

</body>
</html>
