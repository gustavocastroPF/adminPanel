<?php
include "classes/Categoria.class.php";

$c = new Categoria();

if (isset($_REQUEST['id'])) {
    $c->valorPk = $_REQUEST['id'];
    $c = $c->searchById($c);
}
?>
<script src = "<?php echo RAIZ; ?>ajax/categoria.js"></script>
<form>
    <fieldset class="form-group">
        <label for="txtId">ID</label>
        <input type="text" readonly="" class="form-control" id="txtId" value="<?php isset($c->id) ? print $c->id : print'' ?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtNome">Nome</label>
        <input type="text" class="form-control" id="txtNome" placeholder="Ex. Carlos Roberto Amarantes" value="<?php isset($c->id) ? print $c->nome : print'' ?>"">
    </fieldset>
    <br/><a type="button" class="btn btn-primary" href="<?php echo RAIZ;?>Manutencoes/Categorias">Voltar</a>
    <button type="button" class="btn btn-primary" onclick="<?php !isset($c->id) ? print 'insert()' : print'update()' ?>">Submeter</button>
</form>