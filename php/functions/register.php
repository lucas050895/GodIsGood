<?php
    $inc = include("../../config/conexion.php");
    if($inc){
        $consulta = "SELECT * FROM date";
        $resultado = mysqli_query($conexion, $consulta);
        if ($row = $resultado ){
            while($row = $resultado->fetch_array()){
                $name = $row['name'];
                $date = $row['date'];
                $hour = $row['hour'];
            }
        }
    }
