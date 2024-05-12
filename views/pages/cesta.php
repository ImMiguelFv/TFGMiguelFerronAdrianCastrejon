<?php
session_start(); // Iniciar la sesión

// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
  $usuario = $_SESSION['usuario'];
  
    // Si hay una sesión iniciada y se hace clic en el enlace del perfil, redirigir al perfil del usuario
    if (isset($_GET['perfil'])) {
        header("Location: perfil.php");
        exit(); // Asegura de detener la ejecución del resto del código
      
    }
}
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
        <!-- El código incluido del archivo header.html -->
        <!-- Puedes modificarlo según necesites -->
        <?php include 'header.php'; ?>
    </div>

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
<tr>
<th style="text-align:left;">Nombre</th>
<th style="text-align:right;" width="5%">Cantidad</th>
<th style="text-align:right;" width="10%">Precio unidad</th>
<th style="text-align:right;" width="10%">Precio</th>
<th style="text-align:center;" width="5%">Quitar</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["cantidad"]*$item["precio"];
		?>
				<tr>
				<td><img src="<?php echo $item["imagen"]; ?>" class="cart-item-image" /><?php echo $item["nombre"]; ?></td>
				<td style="text-align:right;"><?php echo $item["cantidad"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["precio"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="deckbox.php?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="../assets/icons/trash.svg" alt="Remove Item" width="20" height="20"/></a></td>
				</tr>
				<?php
				$total_quantity += $item["cantidad"];
				$total_price += ($item["precio"]*$item["cantidad"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
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

<button class="boton-grande" > <a href="checkout.php">Finalizar Pedido!</button>


</body>
</html>
