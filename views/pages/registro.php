<?php
require_once '../../controler/controlregistro.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
</head>
<body>
<div id="header">

        <?php include 'header.php'; ?>
    </div> 
    <h2>Registro de Usuario</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" required><br>
        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo isset($correo) ? $correo : ''; ?>" required><br>
        <label for="contraseña">Contraseña:</label><br>
        <input type="password" id="contraseña" name="contraseña" required><br>
        <label for="verificar_contraseña">Verificar Contraseña:</label><br>
        <input type="password" id="verificar_contraseña" name="verificar_contraseña" required><br><br>
        <input type="submit" value="Registrar">
    </form>
    <p style="color: red;"><?php echo $mensajeError; ?></p>
</body>
</html>