<?php
session_cache_expire(30);
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Gustavo Castro">
        <title>AdminPanel</title>
        <?php
        require_once 'helpers/globalHelper.php';
        require_once 'helpers/headerHelper.php';
        ?>
    </head>
    <body>
        <div class="container">
            <?php
            require_once 'visoes/header.php';

            if (isset($_REQUEST['pagina']) && isset($_REQUEST['classe'])) {
                $pagina = $_REQUEST['pagina'];
                $classe = $_REQUEST['classe'];

                require_once "visoes/$classe/" . $classe . $pagina . ".php";
            } else {

                require 'visoes/usuario/usuarioList.php';
            }

            require_once 'helpers/footerHelper.php';
            ?>
        </div>
    </body>
</html>
