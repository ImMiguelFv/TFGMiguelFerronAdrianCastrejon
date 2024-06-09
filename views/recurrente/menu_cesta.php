<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="/TFGMIGUELFERRONADRIANCASTREJON/views/styles/style.css"> <!-- Gem style -->
    
</head>
<body class='cuerpo'>


<div id="cd-shadow-layer"></div>
<div id="cd-cart">
		<h2>Cart</h2>
		<div id="shopping-cart">
<div class="txt-heading">Carro</div>

<a id="btnEmpty" href="<?php echo $form_action; ?>?action=empty">Vaciar</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>

<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["cantidad"]*$item["precio"];
		?>
				<tr class="product-details">
				<td>
					<img src="<?php echo $item["imagen"]; ?>" class="cart-item-image" />
				</td>
				<td >
					<form method="POST" action="<?php echo $form_action; ?>?action=cambiar&codigo=<?php echo $item['codigo']; ?>">
					<p><?php echo $item["nombre"]; ?></p>
					<p><?php echo $item["precio"]; ?> €</p>
					<div class = "quantity-control">
						<a class="selector" id="restar" onclick="updateQuantity(this, -1)"> -</a>
						<input type="number" id="quantity" name="cantidad" value="<?php echo $item['cantidad'] ?>">
						
						<a class="selector" id="añadir" onclick="updateQuantity(this, +1)"> +</a>
						<a href="<?php echo $form_action; ?>?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="/TFGMIGUELFERRONADRIANCASTREJON/views/assets/icons/trash.svg" alt="Remove Item" width="20" height="20"/></a>
					</div>
					</form>
						
					
				</td>

				
				</tr>
				<?php
				$total_quantity += $item["cantidad"];
				$total_price += ($item["precio"]*$item["cantidad"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">El carro está vacío</div>
<?php 
}
?>
</div>

		<a href='/TFGMIGUELFERRONADRIANCASTREJON/views/pages/cesta.php' class="checkout-btn">Checkout - <strong><?php echo "$ ".number_format($total_price, 2); ?></strong></a>
	</div> <!-- cd-cart -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/TFGMIGUELFERRONADRIANCASTREJON/views/javascript/cesta.js"></script> <!-- Gem jQuery -->



</body>
</html>