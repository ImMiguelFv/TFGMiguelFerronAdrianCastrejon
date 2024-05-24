<?php
require_once '../../controler/deckboxcontroler.php';

// Definir la URL de acción para los formularios en la cesta
$form_action = "deckbox.php";
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
	
</head>
<body>

<div id="header">

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
			<form method="post" action="<?php echo $form_action; ?>?action=add&codigo=<?php echo $product_array[$key]["codigo"]; ?>">
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
<div>
<?php include '../recurrente/menu_cesta.php'; ?>
</div>



<!--
<a target="_blank" href="https://icons8.com/icon/TdZUZUq3XNh6/shopping-cart">Cart</a> icon by <a target="_blank" href="https://icons8.com">Icons8</a>

-->
</body>
</html>

