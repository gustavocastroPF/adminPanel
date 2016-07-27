<?php
session_start();

if (isset($_REQUEST['action'])) {

    $acao = strtoupper($_REQUEST['action']);

    switch ($acao) {
        case "LOGIN":
            if (isset($_REQUEST['login']) && isset($_REQUEST['senha'])) {

                require_once "../classes/Usuario.class.php";

                $u = new Usuario();

                $u->login = $_REQUEST['login'];
                $u->senha = $_REQUEST['senha'];

                if (count($u->login($u)) === 1) {
                    $_SESSION["usuario"] = $u->login($u);
                    echo 1;
                    exit;
                } else {
                    echo 0;
                    exit;
                }
            }
            break;
        case "LOGOUT":            
            unset($_SESSION['usuario']);
            session_destroy();
            
            if (!isset($_SESSION['usuario'])) {
                echo 1;
            } else {
                echo 0;
            }

            break;
    }
}






