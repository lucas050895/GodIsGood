<?php
session_start();

// Carga de conexión PDO
include("../../config/conexion.php");
include("../../config/app.php");

// Solo procesa si se envió el formulario por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'], $_POST['password'])) {
    $user     = $_POST['user'];
    $password = $_POST['password'];

    try {
        // Consulta segura del usuario
        $sql = "SELECT id, user, password
                    FROM users
                WHERE user = :user LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $datos_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica si se encontró el usuario y si la contraseña es válida
        if ($datos_usuario && password_verify($password, $datos_usuario['password'])) {
            session_regenerate_id(true);

            $_SESSION['usuario'] = [
                'id'   => $datos_usuario['id'],
                'user' => $datos_usuario['user']
            ];
            $_SESSION['ultimoAcceso'] = date("Y-n-j H:i:s");

            header("Location: " . BASE_URL . "/php/pages/dashboard.php");
            exit();
        } else {
            // Usuario o contraseña incorrectos
            header("Location: " . BASE_URL . "/php/auth/login.php?error=1");
            exit();
        }

    } catch (PDOException $e) {
        // Error de base de datos
        header("Location: " . BASE_URL . "/php/auth/login.php?error=fatal");
        exit();
    }
}
