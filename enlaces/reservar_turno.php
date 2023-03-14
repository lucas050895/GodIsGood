<?php
    include ("../base/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Turno</title>
    <link rel="stylesheet" href="../css/reservar_turno.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
    <main class="contenedor">
        <?php
            include '../layout/menu.php'
        ?>
        <h2>¡Reserva tu turno!</h2>

        <form action="" method="post">
            <div class="datos">
                <h3>ingresa tus datos</h3>
                <div>
                    <div>
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text">
                    </div>

                    <div>
                        <label for="celular">Celular</label>
                        <input id="celular" name="celular" type="text">
                    </div>
                </div>
            </div>

            <div class="dias">
                <h3>Elegi el dia y horario</h3>
                <div>
                    <div>
                        <input type="date" name="fecha" min="2023-03-01" max="2023-12-31" />
                    </div>
                    <div>
                        <select name="estado">
                            <?php
                                $consulta = "SELECT * FROM horas";
                                $resultado = mysqli_query($conexion, $consulta);
                                while($row = $resultado->fetch_array()){
                            ?>

                            <option>
                                <?php
                                    echo $row['hora']
                                ?>
                            </option>
                            
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- <button type="submit" name="enviar">Reservar</button> -->
            <input type="submit" name="enviar" value="RESERVAR">
            <?php
                include("../base/registrar_turno.php")
            ?>
        </form>

    </main>
</body>
</html>
