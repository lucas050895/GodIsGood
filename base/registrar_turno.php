<?php
    include("conexion.php");

    if (isset($_POST['enviar'])) {

        if (strlen($_POST['nombre']) >= 1 && 
            strlen($_POST['celular']) >= 1) {

            $nombre = trim($_POST['nombre']);
            $celular = trim($_POST['celular']);

            $consulta = "INSERT INTO datos(nombre,celular) VALUES ('$nombre','$celular')";

            $resultado = mysqli_query($conexion,$consulta);

            // if($resultado){

            // } else {
                
            // }

        }
    }
?>