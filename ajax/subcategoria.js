function list(pg, ordem, filtro) {

    if (pg === null)
        pg = 1;

    var vlrFiltro = $("#vlrFiltro").val();
    var filtro = $("#filtros").val();

    if (vlrFiltro == "")
        vlrFiltro = null;

    if (filtro === "null")
        filtro = null;

    $.ajax({
        url: RAIZ + "controle/controleSubcategoria.php",
        method: "POST",
        data: {action: "list", pagina: pg, ordem: ordem, filtro: filtro, vlrFiltro: vlrFiltro},
        success: function (dados) {
            $("#tabelaSubcategoria").html(dados);
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function remover(id) {
    $.ajax({
        url: RAIZ + "controle/controleSubcategoria.php",
        method: "POST",
        data: {action: "delete", id: id},
        success: function (dados) {
            alert(dados);
            list(null, null, null);
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function insert() {

    var nome = $("#txtNome").val();
    var categoria = $("#txtCategoria").val();

    $.ajax({
        url: RAIZ + "controle/controleSubcategoria.php",
        method: "POST",
        data: {action: "insert", nome: nome, categoria: categoria},
        success: function (dados) {
            alert(dados);
            location.href = RAIZ + "Manutencoes/Subcategorias";
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function update() {

    var id = $("#txtId").val();
    var nome = $("#txtNome").val();
    var categoria = $("#txtCategoria").val();

    $.ajax({
        url: RAIZ + "controle/controleSubcategoria.php",
        method: "POST",
        data: {action: "update", id: id, nome: nome, categoria:categoria},
        success: function (dados) {
            alert(dados);
            location.href = RAIZ + "Manutencoes/Subcategorias";
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function getCategorias() {
    $.ajax({
        url: RAIZ + "controle/controleSubcategoria.php",
        method: "POST",
        data: {action: "getCategorias"},
        success: function (dados) {
            var categorias = $.parseJSON(dados);
            var retorno = "";
            categorias.forEach(function (c) {
                retorno += "<option value='" + c.id + "'>" + c.nome + "</option>";
            });
            $("#txtCategoria").append(retorno);

        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}
