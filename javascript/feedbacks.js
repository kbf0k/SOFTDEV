document.addEventListener('DOMContentLoaded', function() {
    var depoimentoForm = document.getElementById('depoimentoForm');
    var exampleModal = document.getElementById('exampleModal'); 
    var messageWarning = document.getElementById('message-warning'); 

    // Carregar depoimentos quando a página for carregada
    loadFeedbacks();

    function loadFeedbacks() {
        const feedbackContainer = document.querySelector('.feedbacks');
        feedbackContainer.innerHTML = ''; // Limpa os depoimentos existentes

        fetch('buscar_depoimentos.php')
            .then(response => response.json())
            .then(data => {
                // Caso não haja depoimentos
                if (data.length === 0) {
                    feedbackContainer.innerHTML = '<p>Nenhum depoimento encontrado.</p>';
                } else {
                    // Para cada depoimento, cria um card e adiciona no container
                    data.forEach(feedback => {
                        const card = document.createElement('div');
                        card.classList.add('feedback-card');

                        card.innerHTML = `
                            <h3>${feedback.nome}</h3>
                            <p>${feedback.data}</p>
                            <p>${feedback.mensagem}</p>
                        `;

                        feedbackContainer.appendChild(card);
                    });
                }
            })
            .catch(error => {
                console.error('Erro ao carregar depoimentos:', error);
            });
    }

    // Envio de depoimento
    depoimentoForm.addEventListener('submit', function(event) {
        event.preventDefault(); 

        // Captura os valores do formulário
        var nome = document.getElementById('recipient-name').value;
        var mensagem = document.getElementById('message-text').value;
        var data = document.getElementById('data').value;

        if (nome.trim() !== '' && mensagem.trim() !== '' && data !== '') {
            const minLength = 40;
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

            const longWordRegex = /\b\w{21,}\b/;

            if (longWordRegex.test(mensagem)) {
                messageWarning.textContent = "Nenhuma palavra pode ter mais de 20 caracteres consecutivos.";
                return; 
            } else {
                messageWarning.textContent = ""; 
            }

            var dataFormatada = new Date(data);
            var opcoes = { day: '2-digit', month: '2-digit', year: 'numeric' };
            var dataString = dataFormatada.toLocaleDateString('pt-BR', opcoes); 

            // Envia os dados do formulário para o servidor (PHP)
            const formData = new FormData();
            formData.append('nome', nome);
            formData.append('mensagem', mensagem);
            formData.append('data', data);

            fetch('inserir_depoimento.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Atualiza os depoimentos após inserção
                    loadFeedbacks();

                    var modalInstance = bootstrap.Modal.getInstance(exampleModal);
                    modalInstance.hide();

                    depoimentoForm.reset();
                } else {
                    messageWarning.textContent = 'Erro ao inserir depoimento.';
                }
            })
            .catch(error => {
                console.error('Erro ao enviar depoimento:', error);
                messageWarning.textContent = 'Erro ao enviar depoimento.';
            });
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });
});

// Função de logout
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

