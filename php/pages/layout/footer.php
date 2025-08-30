<?php    
// Evita acceso directo por URL
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