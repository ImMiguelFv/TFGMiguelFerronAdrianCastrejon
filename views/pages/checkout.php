<?php
session_start(); // Iniciar la sesión
require_once("../../modelo/DB.php");
$db_handle = new DB();
// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
  $id = $_SESSION['id'];
  $usuario_info = $db_handle->ejecutarConsulta("SELECT * FROM usuario WHERE id = '$id'");

  echo "Hola1, " . $usuario_info[0]["nombre"] ;
  // Verificar si se encontraron resultados
  if (!empty($usuario_info)) { 
    // Obtener los datos del usuario
        $nombre = $usuario_info[0]["nombre"];
        $apellido = $usuario_info[0]["apellidos"];
        $correo = $usuario_info[0]["correo"];
        $direccion = $usuario_info[0]["direccion"];
        $region = $usuario_info[0]["region"];
        $codigo_postal = $usuario_info[0]["codigo_postal"];
        $ciudad = $usuario_info[0]["ciudad"];
        $telefono = $usuario_info[0]["telefono"];

}else{
    echo "Esta mal";
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../styles/checkout.css">
</head>
<body>
    <!-- Encabezado -->
    <header>
    <div class='logo'> <a href="index.php"><h1>3Dax</h1></a></div>   
    </header>

    <!-- Contenido principal -->
    <div class="contenido">
        <!-- Columna izquierda con formulario de pago -->
        <div class="columna">
            <h2>Formulario de Pago</h2>
            <form action="#" method="POST">
                <label for="metodo-pago">Seleccione un método de pago:</label>
                <select name="metodo-pago" id="metodo-pago">
                    <option value="visa">Visa</option>
                    <option value="paypal">Paypal</option>
                    <option value="mastercard">Mastercard</option>
                </select>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="<?php echo $correo; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required value="<?php echo $nombre; ?>">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required value="<?php echo $apellido; ?>">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required value="<?php echo $direccion; ?>">
                <label for="region">Región:</label>
                <input type="text" id="region" name="region" required value="<?php echo $region; ?>">
                <label for="codigo-postal">Código Postal:</label>
                <input type="text" id="codigo-postal" name="codigo-postal" required value="<?php echo $codigo_postal; ?>">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required value="<?php echo $ciudad; ?>">
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required value="<?php echo $telefono; ?>">
                <button type="submit">Finalizar Pedido</button>
            </form>
        </div>

        <!-- Columna derecha con objetos en el carrito -->
        <div class="columna">
        <div id="shopping-cart">
<div class="txt-heading">Carro</div>

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
    </div>
</body>
</html>
