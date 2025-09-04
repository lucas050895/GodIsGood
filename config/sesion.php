<?php
  /**
  * Gestión de sesión y control de acceso.
  * Verifica si el usuario está autenticado y controla el tiempo de inactividad.
  */

  // Importa configuración global (BASE_URL, etc.)
  require_once __DIR__ . '/../../config/app.php';

  // Inicia la sesión para acceder a variables de sesión
  session_start();

  // Verifica si el usuario ha iniciado sesión correctamente
  if (!isset($_SESSION['usuario'])) {
    // Redirige al login con código de error 3 (no autenticado)
    header("Location: " . BASE_URL . "/php/auth/login.php?error=3");
    exit();
  }else{
    // Recupera la marca de tiempo del último acceso
    $fechaGuardada = $_SESSION["ultimoAcceso"] ?? null;

    if ($fechaGuardada === null) {
      // Si por algún motivo no está seteado, forzar logout
      session_destroy();
      header("Location: " . BASE_URL . "/php/auth/login.php?error=3");
      exit();
    }

    // Obtiene la hora actual en formato compatible
    $ahora = date("Y-n-j H:i:s");

    // Calcula el tiempo transcurrido en segundos desde el último acceso
    $tiempo_transcurrido = strtotime($ahora) - strtotime($fechaGuardada);

    // Si han pasado más de 10 minutos, se destruye la sesión por inactividad
    if ($tiempo_transcurrido >= 600) {
      session_destroy();
      // Redirige al login con código de error 2 (sesión expirada)
      header("Location: " . BASE_URL . "/php/auth/login.php?error=2");
      exit();
    } else {
      // Actualiza la marca de tiempo del último acceso
      $_SESSION["ultimoAcceso"] = $ahora;
    }
  }
