<?php

/**
 * Description of Generico
 *
 * @author gustavo
 */
require_once ('Banco.class.php');

abstract class Generico extends Banco {

    public $tabela = NULL;
    public $camposValores = array();
    public $campoPk = NULL;
    public $valorPk = NULL;
    public $ordem = "id";
    public $filtro = NULL;
    public $vlrFiltro = NULL;
    public $limite = NULL;
    public $pgAtual = 1;

    public function addCampo($campo = NULL, $valor = NULL) {
        if ($campo != NULL) {
            $this->camposValores[$campo] = $valor;
        }
    }

#FIM ADDCAMPO

    public function delCampo($campo = NULL) {
        if (array_key_exists($campo, $this->camposValores)) {
            unset($this->camposValores[$campo]);
        }
    }

#FIM DELCAMPO

    public function setValor($campo = NULL, $valor = NULL) {
        if ($campo != NULL && $valor != NULL) {
            $this->camposValores[$campo] = $valor;
        }
    }

#FIM SETVALOR

    public function getValor($campo = NULL) {
        if ($campo != NULL && array_key_exists($campo, $this->camposValores)) {
            return $this->camposValores[$campo];
        } else {
            return false;
        }
    }

#FIM GETVALOR
}

#FIM CLASSE BANCO
