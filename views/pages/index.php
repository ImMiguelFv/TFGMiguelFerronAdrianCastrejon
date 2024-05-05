<?php
session_start(); // Iniciar la sesión

// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
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
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/index.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>
<body>
<header class='cabecera'>
        <div class='logo'> <a href="index.php">
            <p>3Dax</p> </a>
        </div>
        
    <nav class="menu">
        <ul class='nav-links' id='nav-links'>
            <li class="link"><a href="Deckbox.php">Deckbox</a></li>
            <li class="link"><a href="Gadgets.php">Gadgets</a></li>
            <li class="link"><a href="Llaveros.php">Llaveros</a></li>
            <li class="link"><a href="Servicio.php">Servicio de impresión </a></li>
            <li class="link"><a href="Contacto.php">CONTACTO</a></li>
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
<section class="parallax-section">
    <div class="parallax-image">
        <div class="parallax-content">
        <h1 style="font-size: 48px;">Bienvenido a 3Dax</h1>
        <a href="pages/cajas/Moria.html" class="parallax-link">¡Más Info!</a>
        </div>
    </div>
</section>

<div class="product-description">
    <h2>¡Guarda tus Cartas con Estilo!</h2>
    <p>¿Eres un verdadero fan de One Piece TCG? 
        Entonces necesitas nuestra Caja de Mazo 
        Personalizada 3D. Con diseños únicos inspirados 
        en tus líderes favoritos, esta caja no solo protege 
        tu mazo de cartas y dones, sino que también incluye 
        un compartimento secreto para tus dados. ¡Nunca más 
        pierdas tus cartas y dale un toque de estilo a tus 
        partidas!</p>
</div>
<div class="grid-container">
    <div class="grid-item item1">
      <div class="content">
        <h2>Contenedor 1</h2>
        <p>Texto de prueba</p>
        <button onclick="window.location.href='pages/cajas/Moria.html'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item2">
      <div class="content">
        <h2>Contenedor 2</h2>
        <p>Texto de prueba</p>
        <button>¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item3">
      <div class="content">
        <h2>Contenedor 3</h2>
        <p>Texto de prueba</p>
        <button>¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item4">
      <div class="content">
        <h2>Contenedor 4</h2>
        <p>Texto de prueba</p>
        <button>¡Más info!</button>
      </div>
    </div>
  </div>
</body>
</html>
