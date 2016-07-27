<?php

Class Configuracao {

    public $configuracoes;

    public function __construct() {
        $this->loadSettings();
    }

    public function loadSettings() {

        $arquivo = fopen('/var/www/adminPanel/config/adminPanel.conf', 'r');

        while (!feof($arquivo)) {
            $linha = fgets($arquivo, 1024);
            if ($linha != "") {
                $a = explode("=", $linha);
                $this->configuracoes[$a[0]] = trim($a[1]);
            }
        }
        fclose($arquivo);
    }

    public function saveSettings($obj) {
        $string = "nRegistros=" . $obj->configuracoes["nRegistros"] . "\n";
        $string .= "manutencao=" . $obj->configuracoes["manutencao"];

        $arquivo = fopen('/var/www/adminPanel/config/adminPanel.conf', "w");

        if (fwrite($arquivo, $string))
            $retorno = "Alterações realizadas com sucesso.";
        else
            $retorno = "Impossível realizar as alterações requisitadas.";

        fclose($arquivo);

        return $retorno;
    }

}
