<?php
    /**
    * Protección contra acceso directo por URL.
    * Si este archivo es accedido directamente (sin ser incluido),
    * se ejecuta el script de control de acceso ubicado en config/access.php.
    * Esto previene la exposición de componentes parciales como metadatos.
    */
    if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
        exit('' . include("../../../config/access.php") . '');
    }
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta name="description" content="Reservá tu turno en God Is Good, la barbería donde cada corte es una bendición. Atención personalizada en William C. Morris.">
    <meta name="keywords" content="barbería, turnos online, cortes de pelo, God Is Good, William C. Morris, fade, barba, peluquería masculina">
    <meta name="author" content="Lucas Conde">
    <meta name="theme-color" content="#302E2F">


    <meta property="og:title" content="God Is Good Barbería">
    <meta property="og:description" content="Reservá tu turno online y viví la experiencia God Is Good.">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/assets/img/logo.jpg">
    <meta property="og:url" content="<?php echo BASE_URL; ?>/">
    <meta name="twitter:card" content="summary_large_image">


    <link rel="icon" href="../../../assets/img/favicon.ico" type="image/x-icon">
