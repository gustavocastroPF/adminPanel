<?php
require_once 'classes/Configuracao.class.php';

$c = new Configuracao();

?>
<script src = "<?php echo RAIZ; ?>ajax/configuracao.js"></script>

<fieldset>
    <legend>Configurações </legend>
    <form>
        <fieldset class="form-group">
            <label for="txtNRegistros">Registros exibidos por página</label>
            <input type="text"  class="form-control" id="txtNRegistros" value="<?php echo $c->configuracoes["nRegistros"]; ?>">
        </fieldset>
        <fieldset>
            <label for="txtManutencao">Página em manutenção</label><br/>
            <div class="btn-group" data-toggle="buttons" id="txtManutencao" style="margin-bottom: 10px;">
                <label class="btn btn-primary <?php ($c->configuracoes['manutencao'] == 'FALSE') ? print 'active' : print '' ?>">
                    <input type="radio" value="FALSE" name="txtManutencao" autocomplete="off" <?php ($c->configuracoes["manutencao"] == "FALSE") ? print 'checked' : print '' ?>>Site Ativo
                </label>
                <label class="btn btn-primary <?php ($c->configuracoes['manutencao'] == 'FALSE') ? print '' : print 'active' ?>">
                    <input type="radio" value="TRUE" name="txtManutencao" autocomplete="off" <?php ($c->configuracoes["manutencao"] == "FALSE") ? print '' : print 'checked' ?>> Site em Manutenção
                </label>
            </div>
        </fieldset>
        <fieldset>
            <a type="button" class="btn btn-primary" href="<?php echo RAIZ; ?>">Voltar</a>
            <button type="button" class="btn btn-primary" onclick="update();">Submeter</button>
        </fieldset>
    </form>
</fieldset>