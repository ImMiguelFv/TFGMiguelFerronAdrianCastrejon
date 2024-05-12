<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
    
</head>
<body class='cuerpo'>


<header class='cabecera'>
  <div class="header-top">    
    <div class="icons-container">
          </div> 
    <div class='logo'> <a href="index.php"><h1>3Dax</h1></div>    

    <div class="icons-container">
  <?php
            // Verificar si hay una sesión iniciada
            if (isset($_SESSION['usuario'])) {
                echo  "<li class='link '><a href='cesta.php'><img src='../assets/icons/cesta.svg' alt='Icono de cesta' width='25' height='25'></a></li>";
                // Si hay una sesión iniciada, mostrar el enlace al perfil del usuario y el botón de logout
                echo "<li class='link '><a href='index.php?perfil'><img src='../assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>";
                echo "<li class='link'><a href='logout.php'><img src='../assets/icons/logout.svg' alt='Icono de logout' width='25' height='25'></a></li>";
            } else {
                // Si no hay una sesión iniciada, mostrar el enlace de iniciar sesión
                echo "<li class='link'><a href='login.php'><img src='../assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>";
            }
            ?>
  </div>  <!-- Fin del segundo icons container-->
</div> <!-- Fin del header-top-->
    <nav class="menu">
    
        <ul class='nav-links' id='nav-links'>
        
            <li class="link"><a href="Deckbox.php">Deckbox</a></li>
            <li class="link"><a href="Gadgets.php">Gadgets</a></li>
            <li class="link"><a href="Llaveros.php">Llaveros</a></li>
            <li class="link"><a href="Servicio.php">Servicio de impresión </a></li>
            <li class="link"><a href="Contacto.php">CONTACTO</a></li>
            
        </ul>
        
    </nav>
    
</header> 
</body>
</html>