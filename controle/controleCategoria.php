<?php

session_start();

require_once '../classes/Categoria.class.php';
require_once '../classes/Log.class.php';
require_once '../classes/Configuracao.class.php';

$conf = new Configuracao();

$action = strtoupper($_REQUEST['action']);

switch ($action) {

    case "INSERT":

        $c = new Categoria();
        $c->addCampo("nome", $_REQUEST['nome']);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Cadastro de categoria.");

        echo $c->insert($c);
        $log->insert($log);

        break;
    case "DELETE":
        $c = new Categoria();
        $c->valorPk = $_REQUEST['id'];

        $c2 = new Categoria();
        $c2 = $c2->searchById($c);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Remoção da categoria: " . $c2->nome);

        echo $c->delete($c);
        $log->insert($log);
        break;
    case "UPDATE":

        $c = new Categoria();

        $c->valorPk = $_REQUEST['id'];
        $c->addCampo("nome", $_REQUEST['nome']);

        $c2 = new Categoria();
        $c2 = $c2->searchById($c);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Alterações na categoria: " . $c2->nome);

        $c->update($c);
        $log->insert($log);

        break;
    case "LIST":

        $c = new Categoria();

        if ($_REQUEST['filtro'] != NULL)
            $c->filtro = $_REQUEST['filtro'];

        if ($_REQUEST['vlrFiltro'] != NULL)
            $c->vlrFiltro = $_REQUEST['vlrFiltro'];

        if ($_REQUEST['ordem'] != NULL)
            $c->ordem = $_REQUEST['ordem'];

        $c->pgAtual = $_REQUEST['pagina'];

        $c->limite = $conf->configuracoes["nRegistros"];

        $rows = $c->generateTable($c, array("id", "nome"));

        echo $rows;

        break;
}