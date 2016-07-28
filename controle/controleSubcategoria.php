<?php

session_start();

require_once '../classes/Subcategoria.class.php';
require_once '../classes/Categoria.class.php';
require_once '../classes/Log.class.php';
require_once '../classes/Configuracao.class.php';

$conf = new Configuracao();

$action = strtoupper($_REQUEST['action']);

switch ($action) {

    case "INSERT":

        $s = new Subcategoria();
        $s->addCampo("nome", $_REQUEST['nome']);
        $s->addCampo("categoria", $_REQUEST['categoria']);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Cadastro de subcategoria.");

        echo $s->insert($s);
        $log->insert($log);

        break;
    case "DELETE":
        $s = new Subcategoria();
        $s->valorPk = $_REQUEST['id'];

        $s2 = new Subcategoria();
        $s2 = $s2->searchById($s);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Remoção da subcategoria: " . $s2->nome);

        echo $s->delete($s);
        $log->insert($log);
        break;
    case "UPDATE":

        $s = new Subcategoria();

        $s->valorPk = $_REQUEST['id'];
        $s->addCampo("nome", $_REQUEST['nome']);
        $s->addCampo("categoria", $_REQUEST['categoria']);

        $s2 = new Subcategoria();
        $s2 = $s2->searchById($s);

        $log = new Log();
        $log->addCampo("ip", $_SERVER["REMOTE_ADDR"]);
        $log->addCampo("usuario", $_SESSION['usuario'][0]->id);
        $log->addCampo("acao", "Alterações na subcategoria: " . $s2->nome);

        $s->update($s);
        $log->insert($log);

        break;
    case "LIST":

        $s = new Subcategoria();

        if ($_REQUEST['filtro'] != NULL)
            $s->filtro = $_REQUEST['filtro'];

        if ($_REQUEST['vlrFiltro'] != NULL)
            $s->vlrFiltro = $_REQUEST['vlrFiltro'];

        if ($_REQUEST['ordem'] != NULL)
            $s->ordem = $_REQUEST['ordem'];
        
        $s->pgAtual = $_REQUEST['pagina'];

        $s->limite = $conf->configuracoes["nRegistros"];

        $rows = $s->generateTable($s, array("id", "nome", "categoria"));

        echo $rows;

        break;
        
    case "GETCATEGORIAS":

        $c = new Categoria();
        $c->ordem = "nome";

        $rows = $c->toListAll($c);
        
        $retorno ="";
        
        foreach ($rows as $cat){
            $retorno .= $cat["nome"]."#";
        }
        
        
        echo json_encode($rows);
        break;
}