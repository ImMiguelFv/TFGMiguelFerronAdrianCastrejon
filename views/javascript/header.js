document.addEventListener('DOMContentLoaded', function() {
    // Función para configurar los iconos del usuario
    function setupUserIcons() {
        const userIconsContainer = document.getElementById('user-icons');

        if (isUserLoggedIn) {
            userIconsContainer.innerHTML = `
                <li class='link'><a href='cesta.php'><img src='../assets/icons/cesta.svg' alt='Icono de cesta' width='25' height='25'></a></li>
                <li class='link'><a href='index.php?perfil'><img src='../assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>
                <li class='link'><a href='logout.php'><img src='../assets/icons/logout.svg' alt='Icono de logout' width='25' height='25'></a></li>
            `;
        } else {
            userIconsContainer.innerHTML = `
                <li class='link'><a href='login.php'><img src='../assets/icons/perfil.svg' alt='Icono de perfil' width='25' height='25'></a></li>
            `;
        }
    }

    // Función para cargar el contenido del header
    function loadHeader() {
        const headerHTML = `
            <div class="header-top">    
                <div class="icons-container"></div> 
                <div class='logo'>
                    <a href="index.php"><h1>3Dax</h1></a>
                </div>    
                <div class="icons-container" id="user-icons"></div>
            </div> <!-- Fin del header-top -->
            <nav class="menu">
                <ul class='nav-links' id='nav-links'>
                    <li class="link"><a href="Deckbox.php">Deckbox</a></li>
                    <li class="link"><a href="Gadgets.php">Gadgets</a></li>
                    <li class="link"><a href="Llaveros.php">Llaveros</a></li>
                    <li class="link"><a href="Servicio.php">Servicio de impresión</a></li>
                    <li class="link"><a href="Contacto.php">CONTACTO</a></li>
                </ul>
            </nav>
        `;
        document.getElementById('cabecera').innerHTML = headerHTML;
        setupUserIcons();
    }

    // Cargar el header al inicio
    loadHeader();
});
