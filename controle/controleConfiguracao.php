<?php

require_once '../classes/Configuracao.class.php';

$action = strtoupper($_REQUEST['action']);

switch ($action) {
    case "UPDATE":

        $c = new Configuracao();

        $c->configuracoes["nRegistros"] = $_REQUEST['nRegistros'];
        $c->configuracoes["manutencao"] = $_REQUEST['manutencao'];

        echo $c->saveSettings($c);
        break;
}