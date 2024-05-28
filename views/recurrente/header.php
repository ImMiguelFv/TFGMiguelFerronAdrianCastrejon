
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='/TFGMIGUELFERRONADRIANCASTREJON/styles/estiloscomunes.css'>
</head>
<body class='cuerpo'>


<header class='cabecera'>
  <div class="header-top">    
    <div class="icons-container">
          </div> 
    <div class='logo'> <a class="logolink" href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/index.php"><h1>3Dax</h1></div>    

    <div class="icons-container">
  <?php
            // Verificar si hay una sesión iniciada
            if (isset($_SESSION['correo'])) {
                //echo  "<li class='link '><a href='cesta.php'><img src='../assets/icons/cesta.svg' alt='Icono de cesta' width='25' height='25'></a></li>";
                echo  "<li class='link ' id='cd-cart-trigger'><a class='cd-img-replace' href='#0'><img src='/TFGMIGUELFERRONADRIANCASTREJON/views/assets/icons/cesta.svg' alt='Icono de cesta' width='25' height='25'></a></li>";
                // Si hay una sesión iniciada, mostrar el enlace al perfil del usuario y el botón de logout
                echo "<li class='link '><a href='/TFGMIGUELFERRONADRIANCASTREJON/views/pages/perfil.php'><img src='/TFGMIGUELFERRONADRIANCASTREJON/views/assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>";
                echo "<li class='link'><a href='/TFGMIGUELFERRONADRIANCASTREJON/views/pages/logout.php'><img src='/TFGMIGUELFERRONADRIANCASTREJON/views/assets/icons/logout.svg' alt='Icono de logout' width='25' height='25'></a></li>";
            } else {
                // Si no hay una sesión iniciada, mostrar el enlace de iniciar sesión
                echo "<li class='link'><a href='/TFGMIGUELFERRONADRIANCASTREJON/views/pages/login.php'><img src='/TFGMIGUELFERRONADRIANCASTREJON/views/assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>";
            }
            ?>
  </div>  <!-- Fin del segundo icons container-->
</div> <!-- Fin del header-top-->
    <nav class="menu">
    
        <ul class='nav-links' id='nav-links'>
        
            <li class="link"><a href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/Deckbox.php">Deckbox</a></li>
            <li class="link"><a href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/Gadgets.php">Gadgets</a></li>
            <li class="link"><a href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/Llaveros.php">Llaveros</a></li>
            <li class="link"><a href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/Servicio.php">Servicio de impresión </a></li>
            <li class="link"><a href="/TFGMIGUELFERRONADRIANCASTREJON/views/pages/Contacto.php">CONTACTO</a></li>
            
            
        </ul>
        
    </nav>
    
</header> 
</body>
</html>