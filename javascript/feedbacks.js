document.addEventListener('DOMContentLoaded', function() {
  var depoimentoForm = document.getElementById('depoimentoForm');
  var nomeExibido1 = document.getElementById('nomeExibido1'); 
  var mensagemExibida1 = document.getElementById('mensagemExibida1');
  var dataExibida1 = document.getElementById('dataExibida1');
  var nomeExibido2 = document.getElementById('nomeExibido2'); 
  var mensagemExibida2 = document.getElementById('mensagemExibida2');
  var dataExibida2 = document.getElementById('dataExibida2');
  var nomeExibido3 = document.getElementById('nomeExibido3');
  var mensagemExibida3 = document.getElementById('mensagemExibida3');
  var dataExibida3 = document.getElementById('dataExibida3');
  var nomeExibido4 = document.getElementById('nomeExibido4');
  var mensagemExibida4 = document.getElementById('mensagemExibida4');
  var dataExibida4 = document.getElementById('dataExibida4');
  var exampleModal = document.getElementById('exampleModal'); 
  var messageWarning = document.getElementById('message-warning'); 

  depoimentoForm.addEventListener('submit', function(event) {
      event.preventDefault(); 

      // Captura os valores do formulário
      var nome = document.getElementById('recipient-name').value;
      var mensagem = document.getElementById('message-text').value;
      var data = document.getElementById('data').value;

      if (nome.trim() !== '' && mensagem.trim() !== '' && data !== '') {
          const minLength = 70;
          const maxLength = 200;

          if (mensagem.length < minLength || mensagem.length > maxLength) {
              messageWarning.textContent = `O depoimento deve ter entre ${minLength} e ${maxLength} caracteres.`;
              return; 
          } else {
              messageWarning.textContent = ""; 
          }

        
          const regex = /^[A-Za-zÀ-ÖØ-ÿ0-9\s,.?!'";:-]+$/;

          if (!regex.test(mensagem)) {
              messageWarning.textContent = "Por favor, insira apenas letras, números e espaços.";
              return; 
          } else {
              messageWarning.textContent = ""; 
          }

          // Verifica se há uma palavra com mais de 20 caracteres consecutivos
          const longWordRegex = /\b\w{21,}\b/; // Palavra com mais de 20 caracteres

          if (longWordRegex.test(mensagem)) {
              messageWarning.textContent = "Nenhuma palavra pode ter mais de 20 caracteres consecutivos.";
              return; 
          } else {
              messageWarning.textContent = ""; 
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

          nomeExibido1.textContent = nome;
          mensagemExibida1.textContent = mensagem;
          dataExibida1.textContent = dataString;

          var modalInstance = bootstrap.Modal.getInstance(exampleModal);
          modalInstance.hide();

          depoimentoForm.reset();
      } else {
          alert('Por favor, preencha todos os campos.');
      }
  });
});
// script.js

const feedbacks = [
    {
        name: "Tiago de Souza Barbosa",
        date: "2023-12-13",
        rating: 5,
        review: "Espaço muito legal para crianças, com atividades criativas e educativas. É uma opção muito boa para o contra-turno escolar e colônia de férias."
    },
    {
        name: "Julia Travasso",
        date: "2023-10-30",
        rating: 5,
        review: "Excelente espaço, monitoras super carinhosas e atenciosas! Meu filho ama estar lá ❤️"
    }
];

function loadFeedbacks() {
    const feedbackContainer = document.querySelector('.feedbacks');
    feedbackContainer.innerHTML = '';

    feedbacks.forEach(feedback => {
        const card = document.createElement('div');
        card.classList.add('feedback-card');

        card.innerHTML = `
            <h3>${feedback.name}</h3>
            <p>${feedback.date}</p>
            <div class="stars">${'&#9733;'.repeat(feedback.rating)}</div>
            <p>${feedback.review}</p>
        `;

        feedbackContainer.appendChild(card);
    });
}

document.addEventListener('DOMContentLoaded', loadFeedbacks);


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
