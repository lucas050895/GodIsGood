<?php
    session_start();
    
    // CONEXION
    include("../../config/conexion.php");

    if (isset($_POST['entrar'])) {
        $usuario_ingresado = $_POST['usuario'];
        $contraseña_ingresada = $_POST['contraseña'];

        // HASH DE LA CONTRASEÑA INGRESADA PARA COMPARAR CON EL HASH DE LA BD
        $contraseña_hasheada = hash('sha256', $contraseña_ingresada);

        // USAR SENTENCIA PREPARADA PARA EVITAR INYECCIÓN SQL
        $stmt = $conexion->prepare("SELECT id, user FROM users WHERE user = ? AND password = ? LIMIT 1");
        
        // Manejar error si la preparación falla
        if ($stmt === false) {
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=fatal");
            exit();
        }

        $stmt->bind_param("ss", $usuario_ingresado, $contraseña_hasheada);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $datos_usuario = $resultado->fetch_assoc();
            
            // GENERAR UN NUEVO ID DE SESIÓN PARA SEGURIDAD
            session_regenerate_id(true); 

            $_SESSION['usuario'] = array(
                'id' => $datos_usuario['id'],
                'user' => $datos_usuario['user']
            );
            $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");

            // REDIRECCION EXITOSA
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/dashboard.php");
            exit();
        }else{
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=1");
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('../pages/layout/meta.php')?>

    <!-- TITLE -->
    <title>Login - God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/login.css?v=<?php echo filemtime('../../assets/css/login.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- ICONS -->
    <?php include('../pages/layout/icons.php') ?>
</head>
<body>
    <!-- HEADER -->
    <?php include('../pages/layout/header.php'); ?>

    <!-- MAIN -->
    <main>
        <form action="login.php" method="post">
            <fieldset>
                <legend>login</legend>
                <div>
                    <label for="usuario">Usuario</label>
                    <input type="text" id="usuario" name="usuario" required placeholder="admin">
                </div>

                <div>
                    <label for="contraseña">Contraseña</label>
                    <input type="password" id="contraseña" name="contraseña" required placeholder="admin">
                </div>
            </fieldset>

            <input type="submit" id="entrar" name="entrar" value="Entrar">    

            <!-- MENSAJES DE ERROR -->
            <?php if (!empty($_GET['error'])):
                $mensaje = '';
                switch ($_GET['error']) {
                    case '1':
                        $mensaje = ' ❌ Usuario o contraseña incorrectos.';
                        break;
                    case '2':
                        $mensaje = ' 🕒 Su sesión ha expirado. Vuelva a iniciar sesión.';
                        break;
                    case '3':
                        $mensaje = ' 🚫 Debe iniciar sesión para acceder a esta página.';
                        break;
                    default:
                        $mensaje = ' ⚠️ Ha ocurrido un error. Inténtelo nuevamente.';
                        break;
                }
                echo '<div>' . htmlspecialchars($mensaje) . '</div>';
            endif ?>
        </form>
    </main>

    <!-- FOOTER -->
    <?php include('../pages/layout/footer.php'); ?>
</body>
</html>
