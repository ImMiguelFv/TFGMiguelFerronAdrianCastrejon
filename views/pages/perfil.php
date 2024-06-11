<?php include '../../controler/verificarsesion.php'; 
include __DIR__ . '/../../modelo/DB.php';
$correo = $_SESSION['correo'];
$nombre = DB::obtenerNombre($correo);
$error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
$error1 = isset($_SESSION['error1']) ? $_SESSION['error1'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>3dax</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/login.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/estiloscomunes.css'>
    

</head>
<body>
<div id="header">
    <?php include '../recurrente/header.php'; ?>
</div> 
<div class="contenedor">
    
<div class="card">
    <p>Bienvenido,  <?php echo htmlspecialchars($nombre); ?></p>
<h1 class="card_title">Cambiar contraseña</h1>
    <form action="../../controler/cambiarcontrasena.php" class="card_form" method="post">
        <div class="input">
            <input type="password" class="input_field" id="password_field" name='password' required />
            <label class="input_label">Contraseña</label>
            <span class="input_eye" id="input_eye">
                <img  id="eye_icon" src='../assets/icons/ojoCerrado.svg' alt='Icono de ojo' width='25' height='25'>
            </span>
        </div>
        <div class="input">
            <input type="password" class="input_field" id="confirm_password_field" name='confirm_password' required />
            <label class="input_label">Confirmar Contraseña</label>        
        </div>
        <input type="submit" value="Cambiar">
    </form>
    <?php if($error1): ?>
        <p class="error"><?php echo $error1; ?></p>
    <?php endif; ?>
</div>

<div class="card ">
    <h1 class="card_title">Añadir Direccion</h1>
    <form action="../../controler/agregardireccion.php " class="card_form" method="post">
        <div class="input">
            <input type="text" class="input_field" id="direccion" name='direccion' required />
            <label class="input_label">Dirección</label>  
        </div>
        <div class="input">
            <input type="text" class="input_field" id="ciudad" name="ciudad" required>
            <label class="input_label">Ciudad</label>
        </div>
        <div class="input">
            <input type="text" class="input_field" id="codigo_postal" name="codigo_postal" required>
            <label class="input_label">Código Postal</label>
        </div>
        <div class="input">
            <input type="text" class="input_field" id="pais" name="pais" required>
            <label  class="input_label">País</label>
        </div>
            <input type="submit" value="Agregar Dirección">
            <!--<input type="submit" value="Cambiar"> -->
    </form>
    <?php if($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>
</div>
<div>
<?php include '../recurrente/menu_cesta.php'; ?>
</div>
<script src="../javascript/login.js"></script>
</body>
</html>
