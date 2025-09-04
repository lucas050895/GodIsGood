<?php    
    /**
    * Protección contra acceso directo por URL.
    * Este archivo está diseñado para ser incluido como componente visual.
    * Si se accede directamente desde el navegador, se ejecuta el script
    * de control ubicado en '../../../config/access.php' y se interrumpe la ejecución.
    */
    if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
        exit('' .  include("../../../config/access.php") . '');
    }
?>

<footer>
    <h3>Creado por 
        <a href="http://lucasconde.ddns.net/LucasConde">Lucas Conde</a>
    </h3>
    <span>
        Derechos Reservados © 2025
    </span>
</footer>
