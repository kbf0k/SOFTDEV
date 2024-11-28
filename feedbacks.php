<?php
include_once('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="css/feedbacks.css">
    <script src="javascript/feedbacks.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
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
    <main>
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
            <div id="pageTitle">
                <h1>Contato e Feedbacks</h1>
                <h4>Avalie nosso espaço e confira nossas melhores avaliações!</h4>
            </div>
            <section id="feedbacks">
                <div id="caixas">
                    <div id="caixas-superiores">
                        <div class="caixa" id="caixa1">
                            <div class="feedback-content">
                                <img class="imagemcontato" src="img/user.png" alt="Imagem de contato">
                                <div class="feedback-text">
                                    <h4 id="nomeExibido1">Juliana Souza</h4>
                                    <p id="mensagemExibida1">
                                        Foi tudo excelente desde o atendimento, pré venda, a festa, os monitores
                                        excelentes e minha filha amou!!! Parabéns pelo atendimento e cuidado de todos
                                        vocês!
                                    </p>
                                    <h3 id="dataExibida1">15/08/2024</h3>
                                </div>
                            </div>
                        </div>
                        <div class="caixa" id="caixa2">
                            <div class="feedback-content">
                                <img class="imagemcontato" src="IMG/user.png" alt="">
                                <div class="feedback-text">
                                    <h4 id="nomeExibido2">Maurício</h4>
                                    <p id="mensagemExibida2">Estou maravilhado com o serviço do buffet! A decoração estava impecável, os
                                        animadores foram incríveis e a comida estava deliciosa! Meu filho e seus
                                        amiguinhos se divertiram muito.</p>
                                    <h3 id="dataExibida2">13/08/2024</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="caixas-inferiores">
                        <div class="caixa" id="caixa3">
                            <div class="feedback-content">
                                <img class="imagemcontato" src="IMG/user.png" alt="">
                                <div class="feedback-text">
                                    <h4 id="nomeExibido3">Carla Gonçalves</h4>
                                    <p id="mensagemExibida3">Que festa maravilhosa! Fizeram um trabalho incrível. As crianças se divertiram
                                        muito, a estrutura é perfeita e a comida estava deliciosa. Foi uma experiência
                                        incrível. Muito obrigado!</p>
                                    <h3 id="dataExibida3">10/07/2024</h3>
                                </div>
                            </div>
                        </div>
                        <div class="caixa" id="caixa4">
                            <div class="feedback-content">
                                <img class="imagemcontato" src="IMG/user.png" alt="">
                                <div class="feedback-text">
                                    <h4 id="nomeExibido4">Ana Carolina</h4>
                                    <p id="mensagemExibida4">Gostaria de agradecer o carinho e a atenção na realização da festa do nosso
                                        filho, foi tudo impecável!!! Ficamos muito satisfeitos com a dedicação e empenho
                                        de todos!!</p>
                                    <h3 id="dataExibida4">30/07/2024</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="faq">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    id="buttondepoiment">
                    Faça seu Depoimento
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Faça seu Depoimento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="depoimentoForm">
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nome:</label>
                                        <input type="text" class="form-control" id="recipient-name" maxlength="25"
                                            placeholder="Escreva seu primeiro nome" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Mensagem:</label>
                                        <textarea class="form-control" id="message-text"
                                            placeholder="Escreva aqui seu depoimento" required></textarea>
                                        <small id="message-warning" class="text-danger"></small> <!-- Mensagem de aviso -->
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="data">Data:</label>
                                        <input type="date" class="form-control" id="data" name="data" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Enviar Depoimento</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="duvidas">
                <h3 id="titleDuvidas">Dúvidas Frequentes</h3>
                <div class="duvidas-comentarios">

                    <!-- Acordeão de Dúvidas -->
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    O que é um buffet?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    O buffet é um serviço que oferece alimentação e entretenimento para eventos, como festas
                                    e celebrações, garantindo uma experiência completa para os convidados.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Como faço para reservar um evento?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Para reservar um evento, você deve entrar em contato conosco através do nosso formulário
                                    de contato presente na página de <a href="orcamento.html">orçamento</a>. Estamos à
                                    disposição para ajudar com todos os detalhes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Quais são os serviços inclusos?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Nossos serviços incluem alimentação, decoração, animação e muito mais. Para uma lista
                                    completa, consulte nossa página de <a href="orcamento.html">orçamento</a> ou <a
                                        href="cardapio.html">cardápio</a> entre em contato para mais informações.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Nosso cardápio é flexível?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Sim, você pode alterar e construir o seu próprio cardápio da festa através da nossa
                                    página <a href="cardapio.html">cardápios.</a>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Como entrar em contato conosco?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Consulte nossa área de mensagem logo abaixo nessa mesma página, faça sua pergunta eventoNT
                                    receberá a resposta em poucos minutos.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Seção de Comentários -->
                    <div id="contato">
                        <h3 id="contatotitle">Entre em Contato</h3>
                        <div class="comment-section">
                            <h3>Escreva seu comentário</h3>
                            <textarea placeholder="Eu não entendi como funciona..."></textarea>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>

                </div>
            </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer-section">
                <img src="img/partynet_img.png" alt="TDA Logo" class="footer-logo">
            </div>
            <div class="footer-section">
                <h4>Buffet Fun Farra</h4>
                <p>O Buffet Fun Farra convida você a celebrar sua festa conosco. Oferecemos brinquedos incríveis que
                    garantirão a diversão da criançada. Nosso compromisso é proporcionar festas infantis com um serviço
                    responsável,
                    cuidadoso e de alta qualidade, atendendo às suas expectativas com excelência.</p>
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
</body>

</html>