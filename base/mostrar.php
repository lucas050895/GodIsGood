<?php
    $inc = include ("conexion.php");
    if($inc){
        $consulta = "SELECT * FROM horas";
        $resultado = mysqli_query($conexion, $consulta);
        if ($resultado ){
            while($row = $resultado->fetch_array()){
                $id = $row['id'];
                $hora = $row['hora'];
                ?>
                    <select>
                            <?php echo $hora?>
                    </select>
                <?php
            }
        }
    }
?>