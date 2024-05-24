<?php
require_once '../../controler/deckboxcontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/deckbox.css'>
	<link rel="stylesheet" href="../styles/style.css"> <!-- Gem style -->
</head>
<body>
<!-- Incluyendo el header -->
<div id="header">
        <!-- El código incluido del archivo header.html -->
        <!-- Puedes modificarlo según necesites -->
        <?php include 'header.php'; ?>
    </div>


<div id="product-grid">
	<div class="txt-heading">Productos</div>
	<?php
	$product_array = $db_handle->ejecutarConsulta("SELECT * FROM producto WHERE `codigo` LIKE 'c%' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="deckbox.php?action=add&codigo=<?php echo $product_array[$key]["codigo"]; ?>">
			<div class="product-image"><img class="image" src="<?php echo $product_array[$key]["imagen"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["nombre"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["precio"]; ?></div>
			<div class="cart-action">
                <input type="text" class="product-quantity" name="cantidad" value="1" size="2" />
                <input type="submit" value="Añadir al carro" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>


<div id="cd-cart">
		<h2>Cart</h2>
		<div id="shopping-cart">
<div class="txt-heading">Carro</div>

<a id="btnEmpty" href="deckbox.php?action=empty">Vaciar</a>
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
					<form method="POST" action="deckbox.php?action=cambiar&codigo=<?php echo $item['codigo']; ?>">
					<h2>Deckbox</h2>
					<p><?php echo $item["nombre"]; ?></p>
					<p><?php echo $item["precio"]; ?> €</p>
					<div class = "quantity-control">
						<a class="selector" id="restar" onclick="updateQuantity(-1)"> -</a>
						<input type="number" id="quantity" name="cantidad" value="<?php echo $item['cantidad'] ?>">
						
						<a class="selector" id="añadir" onclick="updateQuantity(+1)"> +</a>
						<a href="deckbox.php?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="../assets/icons/trash.svg" alt="Remove Item" width="20" height="20"/></a>
					</div>
					</form>
						
					
				</td>

				
				</tr>
				<?php
				$total_quantity += $item["cantidad"];
				$total_price += ($item["precio"]*$item["cantidad"]);
		}
		?>
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

		<a href='cesta.php' class="checkout-btn">Checkout - <strong><?php echo "$ ".number_format($total_price, 2); ?></strong></a>
	</div> <!-- cd-cart -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../javascript/cesta.js"></script> <!-- Gem jQuery -->

<!--
<a target="_blank" href="https://icons8.com/icon/TdZUZUq3XNh6/shopping-cart">Cart</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>

-->
</body>
</html>

