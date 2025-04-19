<?php
    $inc = include("../conexion/conexion.php");
    if($inc){
        $consulta = "SELECT * FROM datos";
        $resultado = mysqli_query($conexion, $consulta);
        if ($row = $resultado ){
            while($row = $resultado->fetch_array()){
                $nombre = $row['nombre'];
                $fecha = $row['fecha'];
                $hora = $row['hora'];
            }
        }
    }
?>
