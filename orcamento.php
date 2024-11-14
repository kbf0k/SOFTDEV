<?php
include_once('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento</title>
    <link rel="stylesheet" href="css/orcamento.css">
    <script src="javascript/orcamento.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
</head>

<body>
    <header>
        <nav>
            <div onclick="menuShow()" class="mobile-icon">
                <button><img class="icon" src="img/menu_white_36dp.svg" alt=""></button>
            </div>
            <a href="inicio.php"><img id="logo-buffet" src="img/partynet_img.png" alt="Logo do PartyNet Buffet"></a>
            <ul>
                <li><a href="inicio.php">INÍCIO</a></li>
                <li><a href="cardapio.php">CARDÁPIO</a></li>
                <li><a href="atracoes.php">ATRAÇÕES</a></li>
                <li><a href="orcamento.php">ORÇAMENTO</a></li>
                <li><a href="feedbacks.php">FEEDBACKS</a></li>
            </ul>
            <div class="perfil">
                <?php if (isset($_SESSION['nome_sessao'])): ?>
                    <div class="user">
                        <img id="user-logo" src="img/user-vector.png" alt="">
                        <p><?= $_SESSION['nome_sessao'] ?></p>
                    </div>
                    <div class="logout">
                        <img id="logout" src="img/logout.png" alt="">
                    </div>
                <?php else: ?>
                    <div id="login-sign">
                        <a href="index.php">
                            <button type="button" id="login-button">Entrar</button>
                        </a>
                        <a href="cadastrar.php">
                            <button id="sign-button">Inscrever-se</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li><a href="inicio.php">INÍCIO</a></li>
                <li><a href="cardapio.php">CARDÁPIO</a></li>
                <li><a href="atracoes.php">ATRAÇÕES</a></li>
                <li><a href="orcamento.php">ORÇAMENTO</a></li>
                <li><a href="feedbacks.php">FEEDBACKS</a></li>
            </ul>
        </div>
    </header>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
        <defs>
            <linearGradient id="waveGradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#66257E;" />
                <stop offset="50%" style="stop-color:#6334B1;" />
                <stop offset="100%" style="stop-color:#B843E4;" />
            </linearGradient>
        </defs>
        <path fill="url(#waveGradient1)" d="M0,0 H1440 V20 Q1200,70 960,30 Q720,-10 480,30 Q240,70 0,30 Z"></path>
    </svg>
    <div id="main-real">
        <section class="cta-section">
            <div class="cta-content">
                <h2>Realize a Festa dos Seus Sonhos!</h2>
                <p>Deixe que cuidamos de tudo para que seu evento seja inesquecível. Oferecemos pacotes personalizados e decoração exclusiva.</p>
                <a href="#orcamento" class="cta-button">Solicitar Orçamento</a>
            </div>
        </section>
        <section id="tudomesmo">
            <h1 id="titlePage">Faça seu Orçamento!</h1>
            <div class="form-container">
                <form id="orcamentoForm" action="#" method="post">
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div class="form-group">
                        <label for="convidados">Número de convidados:</label>
                        <input type="number" id="convidados" name="convidados" required>
                    </div>

                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="date" id="data" name="data" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone:</label>
                        <input type="tel" id="telefone" name="telefone" required>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="aniversariante">Nome do aniversariante:</label>
                        <input type="text" id="aniversariante" name="aniversariante" required>
                    </div>

                    <div class="form-group">
                        <label for="horario">Horário:</label>
                        <input type="time" id="horario" name="horario" required>
                    </div>

                    <div class="form-group">
                        <label for="adicionais">Adicionais (lembrancinhas, etc.):</label>
                        <input type="text" id="adicionais" name="adicionais">
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor: </label>
                        <input type="text" id="valor" name="valor" required>
                    </div>

                    <div class="form-group">
                        <label for="pagamento">Forma de pagamento:</label>
                        <select id="pagamento" name="pagamento" onchange="exibirBotaoCartao()" required>
                            <option value="">Selecione...</option>
                            <option value="boleto">Boleto</option>
                            <option value="pix">PIX</option>
                            <option value="cartao">Cartão de Crédito</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="playlist">Link da sua Playlist:</label>
                        <input type="text" id="playlist" name="playlist">
                    </div>

                    <div class="form-group">
                        <label for="mensagem">Mensagem:</label>
                        <textarea id="mensagem" name="mensagem"></textarea>
                    </div>

                    <div class="termos">
                        <input type="checkbox" id="termos" name="termos" required>
                        <label for="termos">Concordo com os <a href="#">Termos e Condições</a></label>
                    </div>
                </form>
            </div>
            <button type="button" class="submit-btn" onclick="enviarFormulario()">Enviar</button>
    </div>
    </section>
    <footer>
        <div class="container">
            <div class="footer-section">
                <img src="img/funfarrakids.png" alt="TDA Logo" class="footer-logo">
            </div>
            <div class="footer-section">
                <h4>Buffet Fun Farra</h4>
                <p>O Buffet Fun Farra convida você a celebrar sua festa conosco. Oferecemos brinquedos incríveis que
                    garantirão a
                    diversão da criançada. Nosso compromisso é proporcionar festas infantis com um serviço responsável,
                    cuidadoso
                    e de alta qualidade, atendendo às suas expectativas com excelência.</p>
            </div>

            <div class="footer-section">
                <h3>Contato</h3>
                <p><strong>Endereço:</strong> Rua Av. Monsenhor Theodomiro Lobo, 100 - Parque Res. Maria Elmira,
                    Caçapava - SP, 12285-050<br>
                    <strong>Email:</strong> <a href="mailto:contato@funfarra.com"
                        target="_blank">contato@funfarra.com</a>
                    <br>
                    <strong>Telefone:</strong> (12) 1234-5678
                </p>
            </div>
        </div>

        <div class="bottom">
            &copy; Buffet Infantil FUN FARRA. Todos os direitos reservados.
        </div>
    </footer>

    <script>
        function exibirBotaoCartao() {
            const pagamento = document.getElementById('pagamento').value;
            // Exibir ou ocultar os contêineres de pagamento
        }

        function enviarFormulario() {
            const pagamento = document.getElementById('pagamento').value;
            const valor = document.getElementById('valor').value;
            const descricao = "Pagamento Orçamento";

            if (pagamento === 'pix') {
                window.location.href = `pix.html?valor=${valor}&descricao=${descricao}`;
            } else if (pagamento === 'cartao') {
                window.location.href = 'cartao.html'; // Redirecionar para a página de cartão
            } else {
                alert('Por favor, selecione uma forma de pagamento válida.');
            }
        }
    </script>
</body>

</html>