<?php include '../../controler/verificarsesion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/index.css'>
    <script src="../javascript/index.js"></script>
</head>
<body class='cuerpo'>
<!-- Incluyendo el header -->
<div id="header">
        <!-- El código incluido del archivo header.html -->
        <!-- Puedes modificarlo según necesites -->
        <?php include 'header.php'; ?>
    </div>


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
        <h2>Caja de Moria</h2>
        <p>Shishishishi</p>
        <button onclick="window.location.href='cajas/Moria.php'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item2">
      <div class="content">
        <h2>Yamato chuan</h2>
        <p>Exclusivo!!!</p>
        <button onclick="window.location.href='cajas/Yamato.php'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item3">
      <div class="content">
        <h2>Cajita de peronitaaa!!!</h2>
        <p>Exclusivo!!!</p>
        <button onclick="window.location.href='cajas/Perona.php'"> ¡Más info!</button>
      </div>
    </div>
    <div class="grid-item item4">
      <div class="content">
        <h2>Caja de dados </h2>
        <p>Sorprende a tu rival!</p>
        <button onclick="window.location.href='cajas/Dados.php'"> ¡Más info!</button>
      </div>
    </div>
  </div>
</body>
</html>
