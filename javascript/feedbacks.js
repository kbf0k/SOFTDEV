var depoimentoForm = document.getElementById('depoimentoForm');
var nomeExibido = document.getElementById('nomeExibido');
var mensagemExibida = document.getElementById('mensagemExibida');
var dataExibida = document.getElementById('dataExibida');
var exampleModal = document.getElementById('exampleModal'); // Referência ao modal

// Função para capturar o envio do formulário e atualizar os campos na caixa de feedback
depoimentoForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Impede o envio tradicional do formulário

  // Captura os valores do formulário
  var nome = document.getElementById('recipient-name').value;
  var mensagem = document.getElementById('message-text').value;
  var data = document.getElementById('data').value;

  // Verifica se todos os campos estão preenchidos
  if (nome.trim() !== '' && mensagem.trim() !== '' && data !== '') {
    // Atualiza o conteúdo exibido na caixa de feedback
    nomeExibido.textContent = nome;
    mensagemExibida.textContent = mensagem;
    dataExibida.textContent = data;

    // Fecha o modal após o envio
    var modalInstance = bootstrap.Modal.getInstance(exampleModal);
    modalInstance.hide();

    // Limpa os campos do formulário (opcional)
    depoimentoForm.reset();
  } else {
    alert('Por favor, preencha todos os campos.');
  }
});
