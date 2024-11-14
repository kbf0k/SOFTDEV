function exibirBotaoCartao() {
  const pagamentoSelect = document.getElementById('pagamento');
  const selectedValue = pagamentoSelect.value;
  const pixContainer = document.getElementById('pix-container');
  const cartaoContainer = document.getElementById('cartao-container');

  if (selectedValue === 'pix') {
      pixContainer.style.display = 'block';
  } else {
      pixContainer.style.display = 'none';
  }

  // Esconder ou mostrar o container do cartão, se necessário
  if (selectedValue === 'cartao') {
      cartaoContainer.style.display = 'block';
  } else {
      cartaoContainer.style.display = 'none';
  }
}


document.getElementById('logout').addEventListener('click', () => {
    Swal.fire({
        title: "Você deseja sair?",
        text: "Não será possível reverter isso",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sim, sair"
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('logout.php', {
                method: 'POST'
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "index.php";
                }
            })
        }
    });
});
