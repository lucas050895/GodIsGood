<?php  
  // INICIAR SESION
  session_start();

  // VERIFICAR SI EL USUARIO ESTA LOGEADO
  if (!isset($_SESSION['usuario'])) {
    header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=3");
    exit();
  }else {
    $fechaGuardada = $_SESSION["ultimoAcceso"];

    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

    if($tiempo_transcurrido >= 1200) {
      session_destroy();
      header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=2");
    }else {
      $_SESSION["ultimoAcceso"] = $ahora;
    }
  }
