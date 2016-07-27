<?php

/**
 * Description of Log
 *
 * @author gustavo
 */
require_once 'Generico.class.php';

class Log extends Generico {

    public function __construct($campos = array()) {
        parent::__construct();

        $this->tabela = "log";
        if (sizeof($campos) <= 0) {
            $this->camposValores = array(
                "ip" => NULL,
                "dataHora" => NULL,
                "usuario" => NULL,
                "acao" => NULL
            );
        }
        $this->campoPk = "id";
    }

    public function generateTable($obj, $array) {

        /*
         * Verifica a existência do elemento ID no array de colunas
         * A coluna ID é obrigatória e deve estar sempre na posição 0!
         */
        if (strtoupper($array[0]) != "ID")
            array_unshift($array, "id");

        /*
         * Lista todos os objetos
         */
        $row = $obj->toList($obj);

        if (count($row) <= 0)
            return "<h3>Nenhum registro encontrado.</h3>";

        /*
         * Deste ponto em diante, a tabela é formada
         */
        $table.="<table class='table table-striped'>"
                . "<thead>"
                . " <tr>";

        for ($i = 0; $i < count($array); $i++) {
            if ($i + 1 != count($array))
                $table.="<th><a onclick='list(null,&quot;" . $array[$i] . "&quot;,null)'>" . ucfirst($array[$i]) . "</a></th>";
            else
                $table.="<th>" . ucfirst($array[$i]) . "</th>";
        }

        $table.="</tr></thead>";
        $table.="<tbody>";

        for ($i = 0; $i < count($row); $i++) {
            $table.="<tr>";
            for ($j = 0; $j < count($array); $j++) {
                $table.="<td>" . $row[$i][$array[$j]] . "</td>";
            }
            $table.="</tr>";
        }
        $table.="</tbody>";
        $table.="</table>";

        return $table . $this->generatePagination($obj);
    }

#FIM GENERATETABLE 

    function generatePagination($obj) {
        $row = $obj->toListAll($obj);
        $n = ceil(count($row) / $obj->limite);

        $pagination = "<ul class='pagination'>";

        for ($i = 1; $i <= $n; $i++) {
            $pagination.="<li><a onclick='list($i,null,null)'>$i</a></li>";
        }
        $pagination.="</ul>";
        return $pagination;
    }

#FIM GENERATEPAGINATION
}
