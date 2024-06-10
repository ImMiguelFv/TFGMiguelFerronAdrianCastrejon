<?php
require_once '../../controler/checkoutcontroler.php';
$correo = $_SESSION['correo'];
$nombre = DB::obtenerNombre($correo);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../styles/checkout.css">
    <link rel="stylesheet" href="../styles/estiloscomunes.css">
    
    <script src="../javascript/checkout.js"></script>
    
</head>
<body>
    <!-- Encabezado -->
    <div id="header">
    <?php include '../recurrente/header2.php'; ?>
    </div>

    <!-- Contenido principal -->
    <div class="contenido">
        <!-- Columna izquierda con formulario de pago -->
        <div class="columna">
            <h1>Formulario de Pago</h1>
            <form id="contactForm" action="#" method="POST">
                    <input id="botonCompra" type="submit" value="Comprar" disabled>
                <h3 for="metodo-pago">Seleccione un método de pago:</h3>
                <select name="metodo-pago" id="metodo-pago">
                    <option value="visa">Visa</option>
                    <option value="paypal">Paypal</option>
                    <option value="mastercard">Mastercard</option>
                </select>
                <?php
                $direcciones = $db_handle->ejecutarConsulta("SELECT * FROM direcciones WHERE correo_usuario = '$correo'");
                if (!empty($direcciones)) { ?>
                    <h3>Tus Direcciones</h3>
                    <?php foreach ($direcciones as $direccion) { ?>
                        <div class="direccion">
                        <input type="radio" name="direccion" value="<?php echo htmlspecialchars($direccion['id_direccion']); ?>" onclick="validarSeleccion()">
                            <h3><?php echo $direccion['direccion']; ?></h3>
                            <p><?php echo $direccion['ciudad']; ?></p>
                            <p><?php echo $direccion['codigo_postal']; ?></p>
                            <p><?php echo $direccion['pais']; ?></p>
                        </div>
                    <?php }
                    } else { ?>
                        <p>No tienes direcciones asignadas,  <?php echo htmlspecialchars($nombre); ?></p>
                        <button><a href="perfil.php">Crear direccion</a></button>
                    <?php } ?>
                </div>
            </form>
            <div id="product-grid">
	
        </div><!-- Fin de la columna 1 -->

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
<th>Nombre</th>
<th>Cantidad</th>
<th>Precio unidad</th>
<th>Precio</th>
</tr>   
<?php       
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["cantidad"]*$item["precio"];
        ?>
                <tr>
                <td><img src="<?php echo $item["imagen"]; ?>" class="cart-item-image" /><?php echo $item["nombre"]; ?></td>
                <td><?php echo $item["cantidad"]; ?></td>
                <td><?php echo "$ ".$item["precio"]; ?></td>
                <td><?php echo "$ ". number_format($item_price,2); ?></td>
                </tr>
                <?php
                $total_quantity += $item["cantidad"];
                $total_price += ($item["precio"]*$item["cantidad"]);
                $_SESSION['precio-total'] = $total_price;
        }
        ?>

<tr>
<td>Total:</td>
<td><?php echo $total_quantity; ?></td>
<td><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
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
