<?php
    session_start();
    
    // CONEXION
    include("../../config/conexion.php");

    if (isset($_POST['user']) && isset($_POST['password'])) {

        $user = $_POST['user'];
        $password = $_POST['password'];

        $stmt = $conexion->prepare("SELECT id, user, password FROM users WHERE user = ? LIMIT 1");

        // Manejar error si la preparación falla
        if ($stmt === false) {
            header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=fatal");
            exit();
        }

        $stmt->bind_param("s", $user);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $datos_usuario = $resultado->fetch_assoc();
            
            if (password_verify($password, $datos_usuario['password'])) {
                // GENERAR UN NUEVO ID
                session_regenerate_id(true); 

                $_SESSION['usuario'] = array(
                    'id' => $datos_usuario['id'],
                    'user' => $datos_usuario['user']
                );
                $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");

                // REDIRECCION EXITOSA
                header("Location: http://lucasconde.ddns.net/GodIsGood/php/pages/dashboard.php");
                exit();
            }
        }
    }
    
    // REDIRECCION CON ERROR
    header("Location: http://lucasconde.ddns.net/GodIsGood/php/auth/login.php?error=1");
    exit();
