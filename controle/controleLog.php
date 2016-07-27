<?php

session_start();

require_once '../classes/Log.class.php';
require_once '../classes/Configuracao.class.php';

$conf = new Configuracao();

$action = strtoupper($_REQUEST['action']);

switch ($action) {

    case "LIST":

        $log = new Log();

        if ($_REQUEST['filtro'] != NULL)
            $log->filtro = $_REQUEST['filtro'];

        if ($_REQUEST['vlrFiltro'] != NULL)
            $log->vlrFiltro = $_REQUEST['vlrFiltro'];

        if ($_REQUEST['ordem'] != NULL)
            $log->ordem = $_REQUEST['ordem'];

        $log->pgAtual = $_REQUEST['pagina'];

        $log->limite = $conf->configuracoes["nRegistros"];

        $rows = $log->generateTable($log, array("id", "ip", "dataHora","usuario","acao"));

        echo $rows;

        break;
}