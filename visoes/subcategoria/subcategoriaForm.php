<?php
include "classes/Subcategoria.class.php";

$s = new Subcategoria();

if (isset($_REQUEST['id'])) {
    $s->valorPk = $_REQUEST['id'];
    $s = $s->searchById($s);
}
?>
<script src = "<?php echo RAIZ; ?>ajax/subcategoria.js"></script>
<form>
    <fieldset class="form-group">
        <label for="txtId">ID</label>
        <input type="text" readonly="" class="form-control" id="txtId" value="<?php isset($s->id) ? print $s->id : print'' ?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtNome">Nome</label>
        <input type="text" class="form-control" id="txtNome" placeholder="Ex. Carlos Roberto Amarantes" value="<?php isset($s->id) ? print $s->nome : print'' ?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtCategoria">Categoria</label>
        <select id="txtCategoria" class="form-control">
            <option value="null">Selecione uma categoria</option>
        </select>
    </fieldset>
    <br/><a type="button" class="btn btn-primary" href="<?php echo RAIZ;?>Manutencoes/Subcategorias">Voltar</a>
    <button type="button" class="btn btn-primary" onclick="<?php !isset($s->id) ? print 'insert()' : print'update()' ?>">Submeter</button>
    <script>
        getCategorias();
    </script>
</form>