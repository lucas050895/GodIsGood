<?php
    // Inicia sesión
    session_start();
    // Configuración de conexión y constantes
    require_once __DIR__ . '/../../config/conexion.php';
    // Carga de ruta URL
    require_once __DIR__ . '/../../config/app.php';

    // Procesar el login solo si viene por POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'], $_POST['password'])) {
        $user     = trim($_POST['user']);
        $password = trim($_POST['password']);

        try {
            // Consulta del usuario
            $stmt = $conexion->prepare("SELECT id, user, password
                                            FROM users
                                        WHERE user = :user LIMIT 1");
            $stmt->execute([':user' => $user]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $storedHash = $row['password'];

                // Contraseña con password_hash()
                if (password_verify($password, $storedHash)) {
                    session_regenerate_id(true);
                    $_SESSION['usuario'] = [
                        'id'   => $row['id'],
                        'user' => $row['user']
                    ];
                    $_SESSION['ultimoAcceso'] = date("Y-m-d H:i:s");

                    header("Location: " . BASE_URL . "/php/pages/dashboard.php");
                    exit();
                }

                // Contraseña antigua en SHA-256 → actualizar a password_hash()
                if (hash('sha256', $password) === $storedHash) {
                    $newHash = password_hash($password, PASSWORD_DEFAULT);
                    $upd = $conexion->prepare("UPDATE users SET password = :new WHERE id = :id");
                    $upd->execute([':new' => $newHash, ':id' => $row['id']]);

                    session_regenerate_id(true);
                    $_SESSION['usuario'] = [
                        'id'   => $row['id'],
                        'user' => $row['user']
                    ];
                    $_SESSION['ultimoAcceso'] = date("Y-m-d H:i:s");

                    header("Location: " . BASE_URL . "/php/pages/dashboard.php");
                    exit();
                }
            }

            // Usuario o contraseña incorrectos
            header("Location: " . BASE_URL . "/php/auth/login.php?error=1");
            exit();

        } catch (PDOException $e) {
            // Error de conexión/consulta
            header("Location: " . BASE_URL . "/php/auth/login.php?error=fatal");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../pages/layout/meta.php')?>
    <title>Login - God Is Good</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="../../assets/css/login.css?v=<?php echo filemtime('../../assets/css/login.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <?php include('../pages/layout/icons.php') ?>
</head>
<body>
    <?php include('../pages/layout/header.php'); ?>

    <main>
        <form action="login.php" method="post">
            <fieldset>
                <legend>Login</legend>
                <div>
                    <label for="user">Usuario</label>
                    <input type="text" id="user" name="user" required placeholder="admin">
                </div>

                <div>
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required placeholder="admin">
                </div>
            </fieldset>

            <input type="submit" id="entrar" name="entrar" value="Entrar">

            <?php 
            // MENSAJES DE ERROR
            if (!empty($_GET['error'])):
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
                    case 'fatal':
                        $mensaje = ' ⚠️ Error en el servidor. Contacte al administrador.';
                        break;
                    default:
                        $mensaje = ' ⚠️ Ha ocurrido un error. Inténtelo nuevamente.';
                        break;
                }
                echo '<div>' . htmlspecialchars($mensaje) . '</div>';
            endif;
            ?>
        </form>
    </main>

    <?php include('../pages/layout/footer.php'); ?>
</body>
</html>
