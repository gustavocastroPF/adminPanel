<?php
if (!isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: /adminPanel/Login");
    exit;
}

require_once 'classes/Subcategoria.class.php';

$s = new Subcategoria();
?>
<fieldset>
    <legend>Manutenção de Subcategorias</legend>
    <div class="col-lg-12" style="margin-bottom: 10px;">
        <a type="button" class="btn btn-default" href="<?php echo RAIZ; ?>Manutencoes/Subcategorias/Formulario"/>
        <span class='glyphicon glyphicon-plus'></span> Novo
        </a>
    </div>

    <form class="col-xs-6">
        <input type="text" id="vlrFiltro" class="form-control"/>
    </form>

    <div class="form-group col-xs-3">
        <select class="form-control" id="filtros">
            <option value="null">Selecione um filtro</option>
            <option value="nome">Nome</option>
            <option value="categoria">Categoria</option>
        </select>
    </div>

    <button type='button' class='btn btn-default' id='buscar' onclick="list(null, null, null)">
        <span class='glyphicon glyphicon-search'></span> Buscar
    </button><br/>

    <script src = "<?php echo RAIZ; ?>ajax/subcategoria.js"></script>    

    <div id="tabelaSubcategoria" class="col-lg-12">

    </div>

    <script>
        list(null, null, null);
    </script>
</fieldset>
