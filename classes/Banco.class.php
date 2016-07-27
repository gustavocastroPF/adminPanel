<?php

/**
 * Description of Banco
 *
 * @author gustavo
 */
abstract class Banco {

    public $servidor = "localhost";
    public $usuario = "root";
    public $senha = "root";
    public $nomeBanco = "teste";
    public $conexao = NULL;
    public $stmt = NULL;
    public $dataset = NULL;
    public $linhasAfetadas = -1;

    public function __construct() {
        $this->conecta();
    }

    public function __destruct() {
        if ($this->conexao != NULL) {
            $this->conexao = NULL;
        }
    }

    public function conecta() {
        try {
            $this->conexao = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->nomeBanco, $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function insert($obj) {

        try {

            $sql = "INSERT INTO " . $obj->tabela . " (";
            for ($i = 0; $i < count($obj->camposValores); $i++) {
                $sql.= key($obj->camposValores);

                if ($i < count($obj->camposValores) - 1)
                    $sql.=", ";
                else
                    $sql.=") ";

                next($obj->camposValores);
            }

            reset($obj->camposValores);

            $sql .= "VALUES (";

            for ($i = 0; $i < count($obj->camposValores); $i++) {
                $sql.= ":" . key($obj->camposValores);

                if ($i < count($obj->camposValores) - 1)
                    $sql.=", ";
                else
                    $sql.=") ";

                next($obj->camposValores);
            }

            $this->stmt = $this->conexao->prepare($sql);


            reset($obj->camposValores);

            for ($i = 0; $i < count($obj->camposValores); $i++) {
                $this->stmt->bindValue(':' . key($obj->camposValores), $obj->camposValores[key($obj->camposValores)]);
                next($obj->camposValores);
            }

            if ($this->stmt->execute())
                return "Objeto persistido com sucesso.";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update($obj) {
        try {
            $sql .= "UPDATE " . $this->tabela . " SET ";

            for ($i = 0; $i < count($obj->camposValores); $i++) {

                $sql.= key($obj->camposValores) . " = :" . key($obj->camposValores);

                if ($i < count($obj->camposValores) - 1)
                    $sql.=", ";
                else
                    $sql.="";

                next($obj->camposValores);
            }
            $sql.=" WHERE " . $obj->campoPk . " = :" . $obj->campoPk;

            reset($obj->camposValores);

            $this->stmt = $this->conexao->prepare($sql);

            for ($i = 0; $i < count($obj->camposValores); $i++) {
                echo key($obj->camposValores);
                $this->stmt->bindValue(':' . key($obj->camposValores), $obj->camposValores[key($obj->camposValores)]);
                next($obj->camposValores);
            }

            $this->stmt->bindValue($obj->campoPk, $obj->valorPk);


            if($this->stmt->execute())
                echo "Objeto alterado com sucesso.";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($obj) {
        try {
            $sql = "DELETE FROM " . $obj->tabela;
            $sql .= " WHERE " . $obj->campoPk . " = :" . $obj->campoPk;

            $this->stmt = $this->conexao->prepare($sql);

            $this->stmt->bindValue($obj->campoPk, $obj->valorPk);

            if ($this->stmt->execute())
                return "Objeto removido com sucesso.";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function toList($obj) {
        Try {
            $inicio = ($obj->limite * $obj->pgAtual) - $obj->limite;

            $sql = "SELECT * FROM " . $obj->tabela;

            $where = "";

            if ($obj->filtro != NULL && $obj->vlrFiltro != NULL) {
                $where.=" WHERE " . $obj->filtro . " LIKE '" . $obj->vlrFiltro . "%'";
            }

            $sql .= $where;
            $sql .= " ORDER BY " . $obj->ordem;

            $sql .=" LIMIT $inicio," . $obj->limite;
            
            $this->stmt = $this->conexao->prepare($sql);
            $this->stmt->bindValue($obj->campoPk, $obj->valorPk);
            $this->stmt->execute();

            $o = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $o;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function toListAll($obj) {
        Try {
            $inicio = ($obj->limite * $obj->pgAtual) - $obj->limite;

            $sql = "SELECT * FROM " . $obj->tabela;

            $where = "";

            if ($obj->filtro != NULL && $obj->vlrFiltro != NULL) {
                $where.=" WHERE " . $obj->filtro . " LIKE '" . $obj->vlrFiltro . "%'";
            }

            $sql .= $where;

            $sql .= " ORDER BY " . $obj->ordem;

            $this->stmt = $this->conexao->prepare($sql);
            $this->stmt->bindValue($obj->campoPk, $obj->valorPk);
            $this->stmt->execute();

            $o = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $o;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function searchById($obj) {
        Try {
            $sql = "SELECT * FROM " . $obj->tabela;

            $sql .= " WHERE " . $obj->campoPk . " = :" . $obj->campoPk;

            $this->stmt = $this->conexao->prepare($sql);

            $this->stmt->bindValue($obj->campoPk, $obj->valorPk);

            $this->stmt->execute();

            $o = $this->stmt->fetch(PDO::FETCH_OBJ);
            return $o;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}
