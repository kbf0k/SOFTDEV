
document.getElementById('logout').addEventListener('click', () => {
    Swal.fire({
        title: "Você deseja sair?",
        text: "Não será possível reverter isso",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#6334B1",
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

function menuShow() {
    let menuMobile = document.querySelector('.mobile-menu');
    if (menuMobile.classList.contains('open')) {
        menuMobile.classList.remove('open')
        document.querySelector('.icon').src = "img/menu_white_36dp.svg"
    }
    else {
        menuMobile.classList.add('open')
        document.querySelector('.icon').src = "img/close_white_36dp.svg"
    }
}

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

document.querySelector('form').addEventListener('submit', function (e) {
    const terms = document.getElementById('terms');
    if (!terms.checked) {
        alert("Você deve aceitar os Termos e Condições para enviar o formulário.");
        e.preventDefault();
    }
});
const express = require("express");
const axios = require("axios"); // Para fazer requisições HTTP
const app = express();

app.use(express.json());

app.post("/gerar-boleto", async (req, res) => {
    const { nome, cpf, valor } = req.body;

    try {
        const response = await axios.post("https://api.gerencianet.com.br/v1/boleto", {
            nome,
            cpf,
            valor: parseInt(valor * 100), // Valor em centavos
        }, {
            headers: {
                Authorization: "Bearer SEU_TOKEN_DE_AUTENTICACAO",
            },
        });

        const boleto_url = response.data.data.boleto_url;
        res.json({ boleto_url });
    } catch (error) {
        console.error(error.response?.data || error.message);
        res.status(500).json({ message: "Erro ao gerar o boleto." });
    }
});

app.listen(3000, () => console.log("Servidor rodando na porta 3000"));

// Função para iniciar o contador
function startCountdown(duration) {
    const timerElement = document.getElementById('timer');
    let time = duration; // Tempo inicial em segundos

    const interval = setInterval(() => {
        const hours = Math.floor(time / 3600); // Calcular horas
        const minutes = Math.floor((time % 3600) / 60); // Calcular minutos
        const seconds = time % 60; // Calcular segundos

        // Exibir o timer no formato: hh:mm:ss
        timerElement.textContent = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;

        time--;

        // Se o tempo acabar, pare o contador
        if (time < 0) {
            clearInterval(interval);
            timerElement.textContent = "Oferta Expirada!";
        }
    }, 1000);
}

// Função para adicionar zero à frente se o número for menor que 10
function pad(number) {
    return number < 10 ? `0${number}` : number;
}

// Iniciar o contador com 20 horas, 9 minutos e 10 segundos
startCountdown(20 * 3600 + 9 * 60 + 10); // 20:09:10 em segundos

