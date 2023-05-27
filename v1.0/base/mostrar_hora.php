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
                    <select name="hora" id="hora">
                        <option >Seleccione</option>
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
                <?php
            }
        }
    }
?>
