<?php
    require_once __DIR__ . '/../../config/app.php'; // Carga de ruta URL

    session_start(); // Inicia la sesión actual para poder destruirla correctamente
    session_unset();
    session_destroy(); // Elimina todos los datos de sesión y finaliza la sesión activa
    header("Location: " . BASE_URL . " /php/auth/login.php"); // Redirige al formulario de inicio de sesión tras cerrar sesión
    exit();
