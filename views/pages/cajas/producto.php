<?php  
require_once("../../../modelo/DB.php");
require_once '../../../controler/productosController.php';
// Definir la URL de acción para los formularios en la cesta
$form_action = "producto.php";

define('RUTA_BASE', '../');
// Verificar si el código del producto está presente en la sesión o en la URL
if(isset($_GET['codigo'])) {
    $codigoProducto = $_GET['codigo'];
} else {
    // Si no se proporciona el código del producto, manejar el caso de error aquí
    echo "El código del producto no está especificado.";
    exit;
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
<div id="header">

        <?php include '../../recurrente/header.php'; ?>
    </div>
    
<div id="content">
    <div class="producto">

    <div class="imagenes">
    <div class="selecionables">
        <?php
            // Consulta para obtener las imágenes relacionadas con el producto
            $consulta = "SELECT ruta_imagen FROM imagenes WHERE producto_codigo = '$codigoProducto'";
            $resultset = DB::ejecutarConsulta($consulta);

            // Verificar si se encontraron imágenes
            if (!empty($resultset)) {
                // Iterar sobre los resultados y generar las etiquetas <img>
                foreach ($resultset as $row) {
                    $ruta_imagen = RUTA_BASE . $row['ruta_imagen'];
                    echo '<img src="' . $ruta_imagen . '" alt="" class="selector">';
                }
            } else {
                // Si no se encontraron imágenes, mostrar un mensaje o imagen de "no disponible"
                echo "No hay imágenes disponibles.";
            }
        ?>
        </div>
    </div>
            <div class="imagenpreview">
            <img src="" alt="" id="preview">
        </div>
        </div>
          <?php
                // Realizar la consulta SQL para obtener las características del producto
                $consulta = "SELECT p.precio, c.* FROM producto p
                INNER JOIN caracteristicas_producto c ON p.codigo = c.producto_codigo WHERE producto_codigo = '$codigoProducto'";
                $resultset = DB::ejecutarConsulta($consulta);

                // Verificar si se encontraron características del producto
                if (!empty($resultset)) {
                    // Obtener la primera fila de resultados (asumiendo que solo hay una fila para un producto)
                    $producto = $resultset[0];
                    
                    // Rellenar los campos HTML con los datos obtenidos de la base de datos
                    echo '<div class="datos">';
                    echo '<h1 class="titulo">' . $producto['titulo'] . '</h1>';
                    echo '<p class="precio">' . $producto['precio'] . ' €</p>';
                    echo '<p class="descripcion">' . $producto['descripcion'] . '</p>';
                    echo '<p class="descripcion2">' . $producto['descripcion2'] . '</p>';
                    echo '<p class="rating">' . $producto['rating'] . '</p>';
                    echo '</div>';
                } else {
                    echo "No se encontraron características para este producto.";
                }
                ?>
    </div>
    <?php
            // Realizar la consulta SQL para obtener los colores
    $consulta = "SELECT nombre, hex, disponible FROM color";
    $resultset = DB::ejecutarConsulta($consulta);

    // Verificar si se encontraron colores
    if (!empty($resultset)) {
        echo '<div class="contenedor">';
        echo '<div class="colores">';
        
        // Recorrer los resultados y generar los cuadros de colores
        foreach ($resultset as $color) {
            $nombre = $color['nombre'];
            $hex = $color['hex'];
            $disponible = $color['disponible'];
            
            // Establecer el color de fondo según la disponibilidad
            // Aqui esta cambiado para poder hacer pruebas eficientes del color
            //Original : $backgroundColor = $disponible ? $hex : '#000000';
            $backgroundColor = $disponible ? $hex : $hex;
            
            // Generar el cuadro de color con el nombre al lado
            echo '<div class="color-item" >';
            echo '<div class="color-cube" style="background-color: ' . $backgroundColor . ';"></div>';
            //echo '<span class="color-name">' . $nombre . '</span>';
            echo '</div>';
        }
        echo '</div>'; // Fin de colores

        // Obtener el parámetro 'codigo' de la URL
        $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        ?>
        <div class="product-grid">
                <form method="post" action="<?php echo $form_action; ?>?action=add&codigo=<?php echo $codigo; ?>">
                    <input type="text" name="cantidad" value="1" size="2" class="product-quantity" />
                    <input type="submit" value="Añadir" class="btnAddAction" />
                </form>
            </div>
        <?php
        echo '</div>'; // Fin de contenedor
    } else {
        echo "No se encontraron colores.";
    }
    ?>



</div>



<div>
<?php include '../../recurrente/menu_cesta.php'; ?>

</div>

<script src="../../javascript/preview.js" defer></script>
</body>
</html>