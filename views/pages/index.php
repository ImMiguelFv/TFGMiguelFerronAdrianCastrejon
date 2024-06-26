<?php
session_start(); // Iniciar la sesión

// Verificar si hay una sesión iniciada
if (isset($_SESSION['correo'])) {
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
    <script src="../javascript/index.js"></script>
</head>
<body class='cuerpo'>

<div id="header">
  <?php include '../recurrente/header.php'; ?>
</div>


<section class="parallax-section">
    <div class="parallax-image">
        <div class="parallax-content">
        <h1>Bienvenido a 3Dax</h1>
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
        <h2>Caja de Moria</h2>
        <p>Shishishishi</p>
        <button onclick="window.location.href='cajas/producto.php?codigo=CM1'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item2">
      <div class="content">
        <h2>Yamato chuan</h2>
        <p>Exclusivo!!!</p>
        <button onclick="window.location.href='cajas/producto.php?codigo=CY1'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item3">
      <div class="content">
        <h2>Cajita de peronitaaa!!!</h2>
        <p>Exclusivo!!!</p>
        <button onclick="window.location.href='cajas/producto.php?codigo=CP1'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item4">
      <div class="content">
        <h2>Caja de dados </h2>
        <p>Sorprende a tu rival!</p>
        <button onclick="window.location.href='cajas/producto.php?codigo=CD1'"> ¡Más info!</button>
      </div>
    </div>
  </div>
  <div>
<?php include '../recurrente/menu_cesta.php'; ?>
</div>
</body>
</html>
