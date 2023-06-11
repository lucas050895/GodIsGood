<?php
    include("conexion.php");

    if (isset($_POST['enviar'])) {

        if (strlen($_POST['nombre']) >= 1 ) {

            $nombre = trim($_POST['nombre']);

            $resultado = mysqli_query($conexion,$consulta);

            if($resultado){
                echo 'si se pudo';
              //  header("Location:../enlaces/turno_reservado.php");
            }
            else {
                echo 'no se pudo';
                // header("Location:../enlaces/turno_no_reservado.php");
            }

        }
    }
?>