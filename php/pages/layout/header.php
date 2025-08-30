<?php    
// Evita acceso directo por URL
    if (basename($_SERVER['PHP_SELF']) === basename(__FILE__)) {
        exit('' .  include("../../../config/access.php") . '');
    }
?>

<header>
    <div>
        <a href="http://lucasconde.ddns.net/GodIsGood/">
            <div>
                <img src="http://lucasconde.ddns.net/GodIsGood/assets/img/logo-sin.png" alt="Logo de la barberia"  sizes="(max-width: 320px)">
            </div>
        </a>

        <h1>God is Good</h1>

        <?php
            $currentPage = $_SERVER['PHP_SELF'];
            
            $loginPage = '/GodIsGood/php/pages/dashboard.php';

            if ($currentPage == $loginPage) {
                ?>
                    <a href="http://lucasconde.ddns.net/GodIsGood/php/auth/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                <?php
            } else {
                ?>
                    <a href="http://lucasconde.ddns.net/GodIsGood/php/auth/login.php">
                        <i class="fa-solid fa-user"></i>
                    </a>
                <?php
            }
        ?>
    </div>
</header>
