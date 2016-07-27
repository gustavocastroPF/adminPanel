<?php

session_start();

require_once '../classes/Usuario.class.php';
require_once '../classes/Log.class.php';
require_once '../classes/Configuracao.class.php';

$conf = new Configuracao();

$action = strtoupper($_REQUEST['action']);

switch ($action) {

    case "INSERT":

        $u = new Usuario();
        $u->addCampo("nome", $_REQUEST['nome']);
        $u->addCampo("login", $_REQUEST['login']);
        $u->addCampo("senha", $_REQUEST['senha']);
        $u->addCampo("email", $_REQUEST['email']);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Cadastro de usuário.");


        echo $u->insert($u);
        $log->insert($log);

        break;
    case "DELETE":
        $u = new Usuario();
        $u->valorPk = $_REQUEST['id'];

        $u2 = new Usuario();
        $u2 = $u2->searchById($u);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Remoção do usuário: " . $u2->nome);

        echo $u->delete($u);
        $log->insert($log);
        break;
    case "UPDATE":

        $u = new Usuario();

        $u->valorPk = $_REQUEST['id'];
        $u->addCampo("nome", $_REQUEST['nome']);
        $u->addCampo("login", $_REQUEST['login']);
        $u->addCampo("senha", $_REQUEST['senha']);
        $u->addCampo("email", $_REQUEST['email']);

        $u2 = new Usuario();
        $u2 = $u2->searchById($u);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Alterações no usuário: " . $u2->nome);

        $u->update($u);
        $log->insert($log);

        break;
    case "LIST":

        $u = new Usuario();

        if ($_REQUEST['filtro'] != NULL)
            $u->filtro = $_REQUEST['filtro'];

        if ($_REQUEST['vlrFiltro'] != NULL)
            $u->vlrFiltro = $_REQUEST['vlrFiltro'];

        if ($_REQUEST['ordem'] != NULL)
            $u->ordem = $_REQUEST['ordem'];

        $u->pgAtual = $_REQUEST['pagina'];

        $u->limite = $conf->configuracoes["nRegistros"];

        $rows = $u->generateTable($u, array("id", "nome", "login"));

        echo $rows;

        break;
}