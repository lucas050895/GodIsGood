<?php
    include("../conexion/conexion.php");

    if(isset($_POST['entrar'])){
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $sql = "SELECT *
                    FROM usuarios
                    WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
        $resultado = mysqli_query($conexion, $sql);

        if($usuario == "admin" && $contraseña == "admin"){
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: dashboard.php");
            exit();
        }else{
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - God Is Good</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <main>
        <?php
            include("../layout/header.php");
        ?>
        
        <section>
            <form action="login.php" method="post">
                <fieldset>
                    <legend>login</legend>
                    <div>
                        <label for="usuario">Usuario</label>
                        <input type="text" id="usuario" name="usuario" required placeholder="admin">
                    </div>

                    <div>
                        <label for="contraseña">Contraseña</label>
                        <input type="text" id="contraseña" name="contraseña" required placeholder="admin">
                    </div>
                </fieldset>
                <input type="submit" id="entrar" name="entrar" value="Entrar">
                
            </form>
        </section>
    </main>
</body>
</html>