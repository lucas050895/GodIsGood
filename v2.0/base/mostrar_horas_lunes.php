<?php
    // CONECXION
    $inc = include ("conexion.php");

        // CONSULTA
        $nombre = "SELECT * FROM datos";

        // RESULTADO DE LA CONECXION Y LA CONSULTA
        $resul_nombre = mysqli_query($conexion, $nombre);

        // BUCLE PARA QUE MUESTRE EN PANTALLA TODO LOS RESULTADOS DE LA TABLA
        while($row = $resul_nombre->fetch_array()){
            ?>
            <!-- CONTENEDOR GENERAL DE LA TABLA -->
            <section>
                <!-- CONTENEDOR DE LA HORA Y EL NOMBRE -->
                <div>
                    <div>
                        <?php
                        // CONDICION SI EL DATO NO ES NULO EN NOMBRE Y ASI MUESTRA DICHO NOMBRE
                            if ( $row['nombre'] != NULL){
                        ?>
                        <?php
                                echo $row['hora']
                        ?>
                    </div>

                    <div>
                        <?php
                                echo $row['nombre'];
                        ?>
                    </div>
                </div>

                <!-- CONTENEDOR DE HORA CUANDO ES FALSO LA PRIMERA CONDICION -->
                <div>
                    <?php
                        // SI EL DATO ES NULO MUESTRA LA HORA Y ADEMAS EL BOTON RESERVAR
                        } else{

                            echo $row['hora'];
                    ?>
                </div>

                <!-- CONTENEDOR DEL BOTON CUANDO ES FALSO LA PRIMERA CONDICION --> 
                <div>
                    <a href="../enlaces/reservar.php">Reservar</a>
                    <?php
                        }
                    ?>
                </div>
            </section>

            <?php
        }

?>
