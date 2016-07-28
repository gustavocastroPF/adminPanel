<?php

require 'classes/Subcategoria.class.php';

$s = new Subcategoria();

array_push($s->camposEstrangeiros, "categoria");

$s->filtro = "nome";
$s->vlrFiltro = "a";

$a = $s->toListTeste($s);

foreach ($a as $o) {
    echo "id:" . $o->id . "<BR>";
    echo "nome:" . $o->nome . "<BR>";
    echo "categoria: [<br>";
    echo "  id:" . $o->categoria->id . "<BR>";
    echo "  nome:" . $o->categoria->nome . "<BR>";
    echo "]<br>---------------------------<br>";
}

