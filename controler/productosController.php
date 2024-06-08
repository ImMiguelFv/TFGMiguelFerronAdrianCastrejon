<?php
session_start();

$db_handle = new DB();


// utils.php
function safeRedirect($url, $params = [])
{
    // Construir la URL sin parámetros
    $cleanUrl = strtok($url, '?');

    // Construir la URL con los nuevos parámetros si los hay
    if (!empty($params)) {
        $query = http_build_query($params);
        $cleanUrl .= '?' . $query;
    }

    header("Location: $cleanUrl");
    exit();
}


if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["cantidad"])) {
                $productByCode = $db_handle->ejecutarConsulta("SELECT * FROM producto WHERE codigo='" . $_GET["codigo"] . "'");
                $itemArray = array($productByCode[0]["codigo"] => array(
                    'nombre' => $productByCode[0]["nombre"],
                    'codigo' => $productByCode[0]["codigo"],
                    'cantidad' => $_POST["cantidad"],
                    'precio' => $productByCode[0]["precio"],
                    'imagen' => $productByCode[0]["imagen"]
                ));

                if (!empty($_SESSION["cart_item"])) {
                    if (array_key_exists($productByCode[0]["codigo"], $_SESSION["cart_item"])) {
                        $_SESSION["cart_item"][$productByCode[0]["codigo"]]["cantidad"] += $_POST["cantidad"];
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }

            break;

        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["codigo"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }

            break;
            case "cambiar":
                if (!empty($_POST["cantidad"]) && !empty($_GET["codigo"])) {
                    $cantidad = intval($_POST["cantidad"]);
                    $codigo = $_GET["codigo"];
                    // Actualizar la cantidad del producto en la sesión del carrito
                    if ($cantidad > 0 && isset($_SESSION["cart_item"][$codigo])) {
                        $_SESSION["cart_item"][$codigo]["cantidad"] = $cantidad;
                    }
            
                }
                // Redirigir a la misma página sin parámetros
                //safeRedirect('deckbox.php');
                break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}


?>
