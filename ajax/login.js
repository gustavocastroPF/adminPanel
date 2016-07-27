function login() {
    var login = $("#txtUser").val();
    var senha = $("#txtSenha").val();

    $.ajax({
        url: RAIZ + "controle/controleLogin.php",
        method: "POST",
        data: {action: "login", login: login, senha: senha},
        success: function (dados) {
            if (dados == 1)
                location.href = 'Home';
            else
                alert("Impossível realizar o login!\nUsuário ou senha incorretos!");
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}

function logout() {
    $.ajax({
        url: RAIZ + "controle/controleLogin.php",
        method: "POST",
        data: {action: "logout"},
        success: function (dados) {
            if (dados == 1) {
                alert("Logout realizado com sucesso.")
                location.href = 'Login';
            } else
                alert("Impossível realizar o logout.");
        },
        error: function (requisicao, error) {
            console.log(error + "\n" + requisicao);
        }
    });
}