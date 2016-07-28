<?php

require 'classes/Subcategoria.class.php';

$s = new Subcategoria();

array_push($s->camposEstrangeiros, "categoria");

$a=json_encode($s->toListTeste($s));


echo $a;

//foreach($a as $o){
  //  echo "nome: ".$o->categoria->nome;
//}

//$x->a->b="aaa";
//echo $x->a->bs;