<?php
session_start(); // Iniciar la sesión

// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario'])) {
    // Si hay una sesión iniciada y se hace clic en el enlace del perfil, redirigir al perfil del usuario
    if (isset($_GET['perfil'])) {
        header("Location: perfil.php");
        exit(); // Asegura de detener la ejecución del resto del código
    }
}