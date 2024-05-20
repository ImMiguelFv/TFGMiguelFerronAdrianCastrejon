<?php
session_start();
require_once("../../modelo/DB.php");
$db_handle = new DB();

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
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
