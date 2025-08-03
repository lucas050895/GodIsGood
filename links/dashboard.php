<?php
    include("../conexion/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord - God Is Good</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <main>
        <?php
            include("../layout/header.php");
        ?>
        
        <section>
            <h2>
                Estos son los turnos del dia de hoy 
                <span>
                    <?php date_default_timezone_set('America/Argentina/Buenos_Aires'); ?>
                    <?php echo date('d/m') ?>
                </span>
            </h2>

            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $consulta = "SELECT *
                                        FROM datos
                                        WHERE fecha = CURDATE() AND hora >= CURTIME()
                                        ORDER BY hora ASC";
                        $resultado = mysqli_query($conexion, $consulta);
                        
                        if ($resultado->num_rows > 0) {
                            while($row = $resultado->fetch_array()){
                                ?>
                                    <tr>
                                        <td><?php echo $row['nombre'] ?></td>
                                        <td><?php echo $row['celular'] ?></td>
                                        <td><?php echo substr($row['hora'], 0, -3) ?></td>
                                    </tr>
                                <?php
                            }
                        }else{
                            ?>
                                <tr>
                                    <td colspan="3">
                                        <?php echo"Por el momento no hay turnos registrados."; ?>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>