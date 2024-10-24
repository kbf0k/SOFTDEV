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
