function list(pg, ordem, filtro) {
    if (pg === null)
        pg = 1;

    var vlrFiltro = $("#vlrFiltro").val();
    var filtro = $("#filtros").val();

    if (vlrFiltro === "")
        vlrFiltro = null;

    if (filtro === "null")
        filtro = null;

    $.ajax({
        url: RAIZ + "controle/controleLog.php",
        method: "POST",
        data: {action: "list", pagina: pg, ordem: ordem, filtro: filtro, vlrFiltro: vlrFiltro},
        success: function (dados) {
            $("#tabelaLog").html(dados);
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}