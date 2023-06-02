<?php
    $inc = include ("conexion.php");

        $consulta = "SELECT hora FROM lunes";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado ){
            while($row = $resultado->fetch_array()){
                ?>
                    <div>
                        <?php
                            echo $row['hora'];

                        ?>
                    </div>
                <?php
            }
                
        }
?>
