<?php
    include("../../config/conexion.php");
    include("../../config/sesion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- META -->
    <?php include('layout/meta.php')?>

    <!-- TITLE -->
    <title>Dashbord - God Is Good</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css?v=<?php echo filemtime('../../assets/css/dashboard.css'); ?>">
    <link rel="stylesheet" href="../../assets/css/styles.css?v=<?php echo filemtime('../../assets/css/styles.css'); ?>">

    <!-- ICONS -->
    <?php include('layout/icons.php') ?>
</head>
<body>
    <!-- HEADER -->
    <?php include("layout/header.php"); ?>

    <!-- MAIN -->
    <main>
        <section>
            <h2>
                Estos son los turnos del dia de hoy 
                <span>
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
                                    FROM data
                                    ORDER BY date ASC, hour ASC";
                        $resultado = mysqli_query($conexion, $consulta);
                        
                        if ($resultado->num_rows > 0) {
                            while($row = $resultado->fetch_array()){
                                ?>
                                <tr>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['cell'] ?></td>
                                    <td><?= substr($row['hour'], 0, -3) ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="3">
                                    <?= "Por el momento no hay turnos registrados."; ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- HEADER -->
    <?php include("layout/footer.php"); ?>
</body>
</html>
