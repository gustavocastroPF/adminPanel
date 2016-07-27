<?php
include "classes/Usuario.class.php";

$u = new Usuario();



if (isset($_REQUEST['id'])) {
    $u->valorPk = $_REQUEST['id'];
    $u = $u->searchById($u);
}
?>
<script src = "<?php echo RAIZ; ?>ajax/usuario.js"></script>
<form>
    <fieldset class="form-group">
        <label for="txtId">ID</label>
        <input type="text" readonly="" class="form-control" id="txtId" value="<?php isset($u->id) ? print $u->id : print'' ?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtNome">Nome</label>
        <input type="text" class="form-control" id="txtNome" placeholder="Ex. Carlos Roberto Amarantes" value="<?php isset($u->id) ? print $u->nome : print'' ?>"">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtEmail">E-mail</label>
        <input type="text" class="form-control" id="txtEmail" placeholder="Ex. carlos@gmail.com" value="<?php isset($u->id) ? print $u->email : print'' ?>">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtLogin">Login</label>
        <input type="text" class="form-control" id="txtLogin" placeholder="Ex. CarlosRobertoAmarantes" value="<?php isset($u->id) ? print $u->login : print'' ?>">
        <small>O login não deve possuir espaços ou caracteres especiais.</small>
    </fieldset>
    <fieldset class="form-group">
        <label for="txtSenha">Senha</label>
        <input type="password" class="form-control" id="txtSenha">
    </fieldset>
    <fieldset class="form-group">
        <label for="txtSenha2">Repetir a senha</label>
        <input type="password" class="form-control" id="txtSenha2">
    </fieldset>
    <br/><a type="button" class="btn btn-primary" href="<?php echo RAIZ;?>">Voltar</a>
    <button type="button" class="btn btn-primary" onclick="<?php !isset($u->id) ? print 'insert()' : print'update()' ?>">Submeter</button>
</form>