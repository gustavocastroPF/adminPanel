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
        url: RAIZ + "controle/controleCategoria.php",
        method: "POST",
        data: {action: "list", pagina: pg, ordem: ordem, filtro: filtro, vlrFiltro: vlrFiltro},
        success: function (dados) {
            $("#tabelaCategoria").html(dados);
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function remover(id) {
    $.ajax({
        url: RAIZ + "controle/controleCategoria.php",
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

    $.ajax({
        url: RAIZ + "controle/controleCategoria.php",
        method: "POST",
        data: {action: "insert", nome: nome},
        success: function (dados) {
            alert(dados);
            location.href = RAIZ + "Manutencoes/Categorias";
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function update() {

    var id = $("#txtId").val();
    var nome = $("#txtNome").val();

    $.ajax({
        url: RAIZ + "controle/controleCategoria.php",
        method: "POST",
        data: {action: "update", id: id, nome: nome},
        success: function (dados) {
            alert(dados);
            location.href = RAIZ + "Manutencoes/Categorias";
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}