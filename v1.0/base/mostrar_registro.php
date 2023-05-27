<?php
    $inc = include("conexion.php");
    if($inc){
        $consulta = "SELECT * FROM datos";
        $resultado = mysqli_query($conexion, $consulta);
        if ($row = $resultado ){
            while($row = $resultado->fetch_array()){
                $nombre = $row['nombre'];
                $dia = $row['dia'];
                $hora = $row['hora'];
            }
        }
    }
?>
