<?php
    /**
    * Protección contra acceso directo por URL.
    * Si este archivo es accedido directamente (sin ser incluido),
    * se ejecuta el script de control de acceso ubicado en config/access.php.
    * Esto previene la exposición de componentes parciales como enlaces y estilos.
    */
    if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
        exit('' . include("../../../config/access.php") . '');
    }
?>

    <!-- BOXICONS  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- FONT AWESOME -->   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
