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

<header>
    <div>
        <a href="<?php echo BASE_URL; ?>">
            <div>
                <img src="<?php echo BASE_URL; ?>/assets/img/logo-sin.png" alt="Logo de la barberia"  sizes="(max-width: 320px)">
            </div>
        </a>

        <h1>God is Good</h1>

        <?php
            $currentPage = $_SERVER['PHP_SELF'];
            
            $loginPage = '/GodIsGood/php/pages/dashboard.php';

            if ($currentPage == $loginPage) {
                ?>
                    <a href="<?php echo BASE_URL; ?>/php/auth/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                <?php
            } else {
                ?>
                    <a href="<?php echo BASE_URL; ?>/php/auth/login.php">
                        <i class="fa-solid fa-user"></i>
                    </a>
                <?php
            }
        ?>
    </div>
</header>
