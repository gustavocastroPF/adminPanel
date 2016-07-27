<?php
if (!isset($_SESSION['usuario'])) {
    session_destroy();
    header("Location: /adminPanel/Login");
    exit;
}

require_once 'classes/Log.class.php';

$log = new Log();
?>
<fieldset>
    <legend>Manutenção de Logs</legend>
    

    <form class="col-xs-6">
        <input type="text" id="vlrFiltro" class="form-control"/>
    </form>

    <div class="form-group col-xs-3">
        <select class="form-control" id="filtros">
            <option value="null">Selecione um filtro</option>
            <option value="nome">Nome</option>
            <option value="login">Login</option>
        </select>
    </div>

    <button type='button' class='btn btn-default' id='buscar' onclick="list(null, null, null)">
        <span class='glyphicon glyphicon-search'></span> Buscar
    </button><br/>

    <script src = "<?php echo RAIZ; ?>ajax/log.js"></script>    

    <div id="tabelaLog" class="col-lg-12">

    </div>

    <script>
        list(null, null, null);
    </script>
</fieldset>


