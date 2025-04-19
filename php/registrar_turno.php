<?php
    include("../conexion/conexion.php");

    $nombre   = $_POST['nombre'];
    $celular  = $_POST['celular'];
    $fecha    = $_POST['fecha'];
    $hora     = $_POST['hora'];

    $consulta = "INSERT INTO datos(nombre,celular,fecha,hora) VALUES ('$nombre','$celular','$fecha','$hora')";

    $resultado = mysqli_query($conexion,$consulta);

    if($resultado){
        header("Location:../links/turno_reservado.php");
    }
    else {
        header("Location:../links/turno_no_reservado.php");
    }
?>