<?php
include_once('config.php');
session_start();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atrações</title>
    <link rel="stylesheet" href="css/atracoes.css">
    <script src="javascript/atracoes.js" defer></script>
    <script src="https://kit.fontawesome.com/6e028b1004.js" crossorigin="anonymous"></script>
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
    </header>

    <main>
        <div class="titulo-atracoes">
            <h1>Nossas Atrações</h1>
            <p>Venha conhecer as nossas principais atrações e despertar a festa do seu filho.</p>
            <a href="#atracoes1"><button type="button">Clique Aqui</button></a>
        </div>

        <div class="carrossel-container">
            <div class="carrossel">
                <div class="item"><img src="img/atracao1.png" alt="Imagem 2"></div>
                <div class="item"><img src="img/atracao2.png" alt="Imagem 1"></div>
                <div class="item"><img src="img/atracao3.png" alt="Imagem 3"></div>
                <div class="item"><img src="img/atracao4.png" alt="Imagem 4"></div>
            </div>
            <div class="controladores">
                <button class="setas" onclick="move(-1)" id="prev"><i class="fa fa-arrow-left"
                        aria-hidden="true"></i></button>
                <button class="setas" onclick="move(1)" id="next"><i class="fa fa-arrow-right"
                        aria-hidden="true"></i></button>
            </div>
        </div>
    </main>

    <section id="atracoes2">
        <div class="titulo">
            <h1>ATRAÇÕES PRINCIPAIS</h1>
        </div>
        <div class="container">
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/brinquedo.png" alt="">
                        <h1>Brinquedos Infantis</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/atracao2.png" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque porro praesentium consequatur
                            quibusdam ratione, reprehenderit saepe numquam minus accusamus eaque harum excepturi alias
                            esse
                            quidem fuga quas architecto suscipit vitae.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/fliperama.png " alt="">
                        <h1>Fliperama e Danças</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/atracao2.png" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque porro praesentium consequatur
                            quibusdam ratione, reprehenderit saepe numquam minus accusamus eaque harum excepturi alias
                            esse
                            quidem fuga quas architecto suscipit vitae.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/radical.png" alt="">
                        <h1>Radical</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/atracao2.png" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque porro praesentium consequatur
                            quibusdam ratione, reprehenderit saepe numquam minus accusamus eaque harum excepturi alias
                            esse
                            quidem fuga quas architecto suscipit vitae.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="atracoes1">
        <div class="container_atracoes1">
            <div class="destaque">
                <h2>Equipe de Recreação</h2>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam cupiditate iure voluptatum animi quaerat ratione aperiam ipsam, tempora cum est ab ad architecto quasi adipisci nesciunt ut totam veritatis. Necessitatibus!</p>
                <a href="#atracoes2"><button type="button">Clique Aqui</button></a>
            </div>
            <div class="img">
                <img src="img/atracao1.png" alt="Atração 1" class="imagem-grande">
                <img src="img/atracao2.png" alt="Atração 2" class="imagem-pequena">
                <img src="img/atracao3.png" alt="Atração 3" class="imagem-pequena">
            </div>
        </div>
    </section>


    <section id="atracoes3">
        <div class="container_atracoes3">
            <h1>Outras Atividades</h1>
            <div class="destaque">
                <h2>Outras Atividades</h2>
                <p>Um dos favoritos das crianças, a piscina de bolinhas é segura, colorida e cheia de diversão!</p>
                <a href="#atracoes4"><button type="button">Clique Aqui</button></a>
            </div>
            <div class="img">
                <img src="img/atracao1.png" alt="Atração 1" class="imagem-grande">
                <img src="img/atracao2.png" alt="Atração 2" class="imagem-pequena">
                <img src="img/atracao3.png" alt="Atração 3" class="imagem-pequena">
            </div>
        </div>
    </section>

    <!-- footer --><!-- footer --><!-- footer --><!-- footer --><!-- footer --><!-- footer --><!-- footer --><!-- footer -->

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