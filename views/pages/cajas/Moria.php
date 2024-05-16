<?php include '../../controler/verificarsesion.php'; ?>

<?php
session_start(); // Iniciar la sesión
error_reporting(E_ALL);
ini_set('display_errors', 1);



/* Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    // Si hay una sesión iniciada y se hace clic en el enlace del perfil, redirigir al perfil del usuario
    if (isset($_GET['perfil'])) {
        header("Location: perfil.php");
        exit(); // Asegura de detener la ejecución del resto del código
    }
}*/


// Verificar si se ha enviado el formulario
if (isset($_POST['enviar'])) {
    // Variables del producto
    $nombre = "Caja Moria";
    $cantidad = $_POST['cantidad']; // Suponiendo que obtienes la cantidad del producto del formulario
    $color = $_POST['color']; // Suponiendo que obtienes el color del producto del formulario

    // Objeto que representa el producto
    $producto = array(
        'nombre' => $nombre,
        'cantidad' => $cantidad,
        'color' => $color
    );

    // Verificar si ya existe un array de productos en la sesión
    if (isset($_SESSION['productos'])) {
        // Si existe, agregar el nuevo producto al array
        $_SESSION['productos'][] = $producto;
    } else {
        // Si no existe, crear un nuevo array con el producto
        $_SESSION['productos'] = array($producto);
    }

     // Mostrar la información del producto agregado
     echo '<div>';
     echo '<h3>Producto Agregado:</h3>';
     echo '<p>Nombre: ' . $nombre . '</p>';
     echo '<p>Cantidad: ' . $cantidad . '</p>';
     echo '<p>Color: ' . $color . '</p>';
     echo '</div>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../styles/producto.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../styles/estiloscomunes.css'>
</head>
<body>
<header class='cabecera'>
        <div class='logo'> <a href="index.php">
            <p>3Dax</p> </a>
        </div>
        
    <nav class="menu">
        <ul class='nav-links' id='nav-links'>
            <li class="link"><a href="../Deckbox.php">Deckbox</a></li>
            <li class="link"><a href="../Gadgets.php">Gadgets</a></li>
            <li class="link"><a href="../Llaveros.php">Llaveros</a></li>
            <li class="link"><a href="../Servicio.php">Servicio de impresión </a></li>
            <li class="link"><a href="../Contacto.php">CONTACTO</a></li>

        </ul>
        
    </nav>
    
</header> 
    
<div id="content">
    <div class="producto">

        <div class="imagenes">
        <div class="selecionables">
            <img src="../../assets/Productos/MoiraCage/Moria_Preview.jpg" alt="" class="selector">
            <img src="../../assets/Productos/MoiraCage/Moria_Front.jpg" alt="" class="selector">
            <img src="../../assets/Productos/MoiraCage/Moria_Back.jpg" alt="" class="selector">
            <img src="../../assets/Productos/MoiraCage/Moria_Lado.jpg" alt="" class="selector">
            <img src="../../assets/Productos/MoiraCage/Moria_Lado1.jpg" alt="" class="selector">
        </div>
        
            <div class="imagenpreview">
            <img src="../../assets/Productos/MoiraCage/Moria_Preview.jpg" alt="" id="preview">
        </div>
          </div>
          <div class="datos">
            <h1 class="nombre">Caja de Moira para juego de cartas de One Piece</h1>
            <h2 class="descripcion_producto">Información de producto</h2>
            <h3 class="descripcion_producto">Precio</h3>
            <p class="precio">10.99€</p>
            <h2 class="descripcion_producto">Características</h2>
            <p>Caja para el almacenamiento del deck de cartas de One Piece con la tematica de Moira</p>
        </div>
    </div>

                       
                <form class="formulario">             
                    <label for="cantidad">Cantidad:</label>
                    <select id="cantidad" name="cantidad">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                    </select>
                    <label for="color">Colores:</label>
                    <select id="color" name="color">
                      <option value="Rojo">Rojo</option>
                      <option value="Magenta">Magenta</option>
                      <option value="Amarillo">Amarillo</option>
                      <option value="Azul">Azul</option>
                      <option value="Blanco">Blanco</option>
                      <option value="Negro">Negro</option>
                    </select>
                    <div class='campo'>
                        <input type='submit' name='enviar' value='Enviar'  /> Añadir a la cesta
                    </div>
                    <button id="mostrarInfo">Mostrar Información de la session</button>

              </form>
    
        
</div>

<script src="../../javascript/preview.js" defer></script>
<script>

document.getElementById('mostrarInfo').addEventListener('click', function() {
    // Obtener la información de la sesión
    var productos = <?php echo json_encode($productos); ?>;

    // Crear un mensaje con la información de los productos
    var mensaje = "Productos en la sesión:\n";
    for (var i = 0; i < productos.length; i++) {
        mensaje += "Nombre: " + productos[i]['nombre'] + ", Cantidad: " + productos[i]['cantidad'] + ", Color: " + productos[i]['color'] + "\n";
    }

    // Mostrar la alerta con la información de los productos
    alert(mensaje);
});

    </script>
</body>
</html>