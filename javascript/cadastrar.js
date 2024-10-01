function voltar() {
    window.history.back();
}

function verificarsenha() {
    const senha = document.getElementById('senha').value;
    const repetirSenha = document.getElementById('repetir-senha').value;
    const mensagemErro = document.getElementById('mensagem-erro');

    if (senha !== repetirSenha) {
        mensagemErro.textContent = "As senhas não se coincidem";
    }
    mensagemErro.textContent = '';
    return true;
}