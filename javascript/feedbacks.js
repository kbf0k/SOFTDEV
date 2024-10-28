document.addEventListener('DOMContentLoaded', function() {
  var depoimentoForm = document.getElementById('depoimentoForm');
  var nomeExibido1 = document.getElementById('nomeExibido1'); // Atualizado para corresponder ao ID
  var mensagemExibida1 = document.getElementById('mensagemExibida1'); // Atualizado para corresponder ao ID
  var dataExibida1 = document.getElementById('dataExibida1'); // Atualizado para corresponder ao ID
  var nomeExibido2 = document.getElementById('nomeExibido2'); // Adicionando os IDs dos depoimentos
  var mensagemExibida2 = document.getElementById('mensagemExibida2');
  var dataExibida2 = document.getElementById('dataExibida2');
  var nomeExibido3 = document.getElementById('nomeExibido3');
  var mensagemExibida3 = document.getElementById('mensagemExibida3');
  var dataExibida3 = document.getElementById('dataExibida3');
  var nomeExibido4 = document.getElementById('nomeExibido4');
  var mensagemExibida4 = document.getElementById('mensagemExibida4');
  var dataExibida4 = document.getElementById('dataExibida4');
  var exampleModal = document.getElementById('exampleModal'); // Referência ao modal
  var messageWarning = document.getElementById('message-warning'); // Referência à mensagem de aviso

  // Função para capturar o envio do formulário e atualizar os campos na caixa de feedback
  depoimentoForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Impede o envio tradicional do formulário

      // Captura os valores do formulário
      var nome = document.getElementById('recipient-name').value;
      var mensagem = document.getElementById('message-text').value;
      var data = document.getElementById('data').value;

      // Verifica se todos os campos estão preenchidos
      if (nome.trim() !== '' && mensagem.trim() !== '' && data !== '') {
          // Verifica o comprimento da mensagem
          const minLength = 40; // Altere aqui para 40 caracteres
          const maxLength = 200;

          if (mensagem.length < minLength || mensagem.length > maxLength) {
              messageWarning.textContent = `O depoimento deve ter entre ${minLength} e ${maxLength} caracteres.`;
              return; // Interrompe a execução se a validação falhar
          } else {
              messageWarning.textContent = ""; // Limpa a mensagem de erro
          }

          // Regex para permitir letras, números, espaços e pontuação
          const regex = /^[A-Za-zÀ-ÖØ-ÿ0-9\s,.?!'";:-]+$/; // Permite letras, números, espaços e pontuações comuns

          if (!regex.test(mensagem)) {
              messageWarning.textContent = "Por favor, insira apenas letras, números e espaços.";
              return; // Interrompe a execução se a validação falhar
          } else {
              messageWarning.textContent = ""; // Limpa a mensagem de erro
          }

          // Verifica se há uma palavra com mais de 20 caracteres consecutivos
          const longWordRegex = /\b\w{21,}\b/; // Palavra com mais de 20 caracteres

          if (longWordRegex.test(mensagem)) {
              messageWarning.textContent = "Nenhuma palavra pode ter mais de 20 caracteres consecutivos.";
              return; // Interrompe a execução se a validação falhar
          } else {
              messageWarning.textContent = ""; // Limpa a mensagem de erro
          }

          // Formata a data para o formato desejado
          var dataFormatada = new Date(data);
          var opcoes = { day: '2-digit', month: '2-digit', year: 'numeric' };
          var dataString = dataFormatada.toLocaleDateString('pt-BR', opcoes); // Formato: dd/mm/yyyy

          // Desloca os depoimentos existentes
          nomeExibido4.textContent = nomeExibido3.textContent;
          mensagemExibida4.textContent = mensagemExibida3.textContent;
          dataExibida4.textContent = dataExibida3.textContent;

          nomeExibido3.textContent = nomeExibido2.textContent;
          mensagemExibida3.textContent = mensagemExibida2.textContent;
          dataExibida3.textContent = dataExibida2.textContent;

          nomeExibido2.textContent = nomeExibido1.textContent;
          mensagemExibida2.textContent = mensagemExibida1.textContent;
          dataExibida2.textContent = dataExibida1.textContent;

          // Atualiza o conteúdo exibido na caixa de feedback
          nomeExibido1.textContent = nome;
          mensagemExibida1.textContent = mensagem;
          dataExibida1.textContent = dataString; // Usando a data formatada

          // Fecha o modal após o envio
          var modalInstance = bootstrap.Modal.getInstance(exampleModal);
          modalInstance.hide();

          // Limpa os campos do formulário (opcional)
          depoimentoForm.reset();
      } else {
          alert('Por favor, preencha todos os campos.');
      }
  });
});
