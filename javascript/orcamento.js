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

document.querySelector('form').addEventListener('submit', function(e) {
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
