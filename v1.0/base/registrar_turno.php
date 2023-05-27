<?php
    include("conexion.php");

    if (isset($_POST['enviar'])) {

        if (strlen($_POST['nombre']) >= 1 && 
            strlen($_POST['celular']) >= 1 &&
            strlen($_POST['dia']) >= 1 &&
            strlen($_POST['hora']) >= 1) {

            $nombre = trim($_POST['nombre']);
            $celular = trim($_POST['celular']);
            $dia = trim($_POST['dia']);
            $hora = trim($_POST['hora']);

            $consulta = "INSERT INTO datos(nombre,celular,dia,hora) VALUES ('$nombre','$celular','$dia','$hora')";

            $resultado = mysqli_query($conexion,$consulta);

            if($resultado){
                header("Location:../enlaces/turno_reservado.php");
            }
            else {
                header("Location:../enlaces/turno_no_reservado.php");
            }

        }
    }
?>