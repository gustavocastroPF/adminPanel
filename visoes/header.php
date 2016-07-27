<script src="<?php echo RAIZ; ?>ajax/login.js"></script>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo RAIZ; ?>">AdminPanel</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo RAIZ; ?>">Home</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manutenções<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo RAIZ; ?>Manutencoes/Categorias">Categorias</a></li>
                    <li><a href="<?php echo RAIZ; ?>Manutencoes/Subcategorias">Subcategoria</a></li>
                    <li><a href="#">Page 1-3</a></li>
                </ul>
            </li>
            <li><a href="<?php echo RAIZ; ?>Usuarios">Usuários</a></li>
            <li><a href="<?php echo RAIZ; ?>Configuracoes">Configurações</a></li>
            <li><a href="<?php echo RAIZ; ?>Logs">Logs</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a style="cursor:pointer;" onclick="logout();"><span class='glyphicon glyphicon-log-out' style="margin-right: 10px;" ></span>Logout</a></li>
        </ul>
    </div>
</nav>