<?php include '../../controler/verificarsesion.php'; ?>

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
            <?php
            // Verificar si hay una sesión iniciada
            if (isset($_SESSION['usuario'])) {
                // Si hay una sesión iniciada, mostrar el enlace al perfil del usuario
                echo "<li class='link'><a href='index.php?perfil'><svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>
                <path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
                </svg></a></li>";
            } else {
                // Si no hay una sesión iniciada, mostrar el enlace de iniciar sesión
                echo "<li class='link'><a href='login.php'><svg class='w-6 h-6 text-gray-800 dark:text-white' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' viewBox='0 0 24 24'>
                <path fill-rule='evenodd' d='M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z' clip-rule='evenodd'/>
                </svg></a></li>";
            }
            ?>
        </ul>
        
    </nav>
    
</header> 
    
<div id="content">
    <div class="producto">

        <div class="imagenes">
        <div class="selecionables">
            <img src="../../assets/Productos/PeronaCage/preview.jpg" alt="" class="selector">
            
        </div>
        
            <div class="imagenpreview">
            <img src="../../assets/Productos/PeronaCage/preview.jpg" alt="" id="preview">
        </div>
          </div>
          <div class="datos">
            <h1 class="nombre">Caja de Perona para juego de cartas de One Piece</h1>
            <h2 class="descripcion_producto">Información de producto</h2>
            <h3 class="descripcion_producto">Precio</h3>
            <p class="precio">30€</p>
            <h2 class="descripcion_producto">Características</h2>
            <p>Caja para el almacenamiento del deck de cartas de One Piece con la tematica de Perona</p>
        </div>
    </div>

            <form class="formulario">             
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
                    <button type="button" onclick="agregarACesta()">Añadir a la cesta</button>
                </form>
                

              </form>
    
        
</div>

<script src="../../javascript/preview.js" defer></script>
<script>
function agregarACesta() {
    // Obtener los valores seleccionados de cantidad y color
    var cantidad = document.getElementById('cantidad').value;
    var color = document.getElementById('color').value;

    // Simular añadir el producto a la cesta
    console.log(`Añadido a la cesta: ${cantidad} producto(s) de color ${color}`);

    // Aquí puedes añadir código para actualizar el carrito de compras en la página,
    // o enviar estos datos al servidor mediante una solicitud AJAX, por ejemplo.

    // Muestra un mensaje simple al usuario (opcional)
    alert(`Añadido a la cesta: ${cantidad} producto(s) de color ${color}`);
}

    </script>
</body>
</html>