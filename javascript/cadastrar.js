function voltar() {
    window.history.back();
}

document.getElementById('cadastrar').addEventListener('submit', function(event){
    const senha = document.getElementById('senha').value;
    const repetir = document.getElementById('repetir_senha').value;
    if (senha !== repetir){
        event.preventDefault(); 
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "As senhas não se coincidem",
            confirmButtonColor: "#6334B1"
          });
    } else {
        Swal.fire({
            title: "Usuario Cadastrado com sucesso",
            text: "Você será redirecionado para o login",
            icon: "success",
            confirmButtonColor: "#6334B1"
          })
    }
});