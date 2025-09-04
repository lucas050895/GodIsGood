<!-- Página de acceso denegado - GOD IS GOOD
     Estructura HTML que muestra un mensaje visual de restricción
     cuando el usuario intenta acceder a una sección sin permisos.
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Metadatos y configuración del documento -->
    <?php include("meta.php"); ?>

    <!-- Título de la página -->
    <title>Acceso Denegado - God Is Good</title>

    <!-- Estilos en linea -->
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        
        body{
            background: linear-gradient(to left, #4A569D, #DC2424);
            color: #D2D0D3;
        }

        main{
            height: calc(100vh - 3em);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        main > h1{
            text-align: center;
            font-size: 4em;
        }
        main > h2{
            text-align: center;
            font-size: 4em;
        }


        /*Footer*/
        footer{
            width: 100%;
            height: 3em;
            position: fixed;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        footer *{
            color: #D2D0D3;
            font-size: .9em;
        }
    </style>
</head>
<body>
    <!-- Main -->
    <main>
        <h1>❌</h1>
        <h2>¡Acceso Denegado!</h2>
    </main>
    
    <footer>
        <h3>Creado por 
            <a href="http://lucasconde.ddns.net/LucasConde">Lucas Conde</a>
        </h3>
        <span>
            Derechos Reservados © 2025
        </span>
    </footer>
</body>
