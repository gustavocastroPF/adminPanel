function update() {

    var nRegistros = $("#txtNRegistros").val();
    var manutencao = $('input[name=txtManutencao]:checked').val();

    $.ajax({
        url: RAIZ + "controle/controleConfiguracao.php",
        method: "POST",
        data: {action: "update", nRegistros: nRegistros, manutencao: manutencao},
        success: function (dados) {
            alert(dados);
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}