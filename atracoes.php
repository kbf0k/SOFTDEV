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
                    <a href="perfil.php">
                        <img id="user-logo" src="img/user-vector.png" alt="">
                        <p><?= $_SESSION['nome_sessao'] ?></p>
                    </a>
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
            <h1>NOSSAS ATRAÇÕES</h1>
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

    <section id="atracoes1">
        <div class="titulo">
            <h1>O que oferecemos?</h1>
        </div>
        <div class="container_atracoes1">
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/playground.png" alt="">
                        <h1>Playgrounds</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/playground_gigante.webp" alt="">
                        <p>Explore nossos incríveis playgrounds, repletos de brinquedões emocionantes e infláveis gigantes que garantem diversão sem limites para crianças de todas as idades! Uma experiência cheia de aventura, risadas e muita energia.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/bolinhas.png " alt="">
                        <h1>Brinquedos Clássicos</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/classicos.jpg" alt="">
                        <p>Os clássicos não podem faltar! Pula-pulas, escorregadores e piscinas de bolinhas garantem a diversão que nunca sai de moda, encantando gerações e proporcionando momentos inesquecíveis.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="conteudo">
                    <div class="fronteira">
                        <img src="img/tirolesa.png" alt="">
                        <h1>Brinquedos Radicais</h1>
                    </div>
                    <div class="trazeira">
                        <img src="img/brinquedo_radical.jpg" alt="">
                        <p>Os brinquedos radicais da PartyNet são perfeitos para crianças que adoram aventura e adrenalina. Todas as atrações são supervisionadas por profissionais treinados para garantir a segurança e o bem-estar durante as atividades.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="atracoes2">
        <div class="titulo">
            <h1>Equipe de Recreação</h1>
        </div>
        <div class="container">
            <img src="img/recreadores.JPG" alt="">
            <div class="content">
                <p>A equipe de recreação do Buffet PartyNet é formada por profissionais dedicados a criar momentos inesquecíveis e seguros para crianças e adultos. Com atividades criativas e adaptadas para todas as idades, nossos recreadores proporcionam um ambiente acolhedor e alegre em qualquer evento, garantindo diversão e interação para todos os convidados. </p>
            </div>
        </div>
    </section>


    <section id="atracoes3">
        <div class="titulo">
            <h1>Outras Atividades</h1>
        </div>
        <div class="container_atracoes3">
            <div class="item-atracoes3">
                <img src="img/outras_atracoes1.png" id="img_atracao1 " alt="Atração 1" class="imagem-grande">
                <div class="conteudo-item">
                    <h1>RADICAIS</h1>
                </div>
            </div>
            <div class="item-atracoes3">
                <img src="img/outras_atracoes2.png" id="img_atracao2 " alt="Atração 2" class="imagem-pequena">
                <div class="conteudo-item">
                    <h1>BRINQUEDOS INFANTIS</h1>
                </div>
            </div>
            <div class="item-atracoes3">
                <img src="img/outras_atracoes3.png" id="img_atracao3 " alt="Atração 3" class="imagem-pequena">
                <div class="conteudo-item">
                    <h1>RODA GIRA-GIRA</h1>
                </div>
            </div>
            <div class="item-atracoes3">
                <img src="img/palhaço.png" id="img_atracao3 " alt="Atração 3" class="imagem-pequena">
                <div class="conteudo-item">
                    <h1>PALHAÇOS E BRINCADEIRAS</h1>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-section">
                <img src="img/partynet_img.png" alt="TDA Logo" class="footer-logo">
            </div>
            <div class="footer-section">
                <h4>Buffet PARTY NET</h4>
                <p>O Buffet PARTY NET convida você a celebrar sua festa conosco. Oferecemos brinquedos incríveis que
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
            &copy; Buffet Infantil PARTY NET. Todos os direitos reservados.
        </div>
    </footer>
</body>

</html>