<?php
include_once('config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partynet Buffet</title>
    <link rel="stylesheet" href="css/inicio.css">
    <script src="javascript/inicio.js" defer></script>
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
            <div id="title-subtitle">
                <h1>PartyNet: Onde a Diversão se Transforma em Festa!</h1>
                <h3>Criando Memórias Incríveis com Muita Alegria, Segurança e Momentos Mágicos!</h3>
            </div>

            <div class="container">
                <div class="carrossel">
                    <div class="slides">
                        <div class="slide">
                            <div id="grid-imgs">
                                <div id="img1"></div>
                                <div id="img2"></div>
                                <div id="img3"></div>
                            </div>
                        </div>
                        <div class="slide">
                            <div id="grid-imgs">
                                <div id="img4"></div>
                                <div id="img5"></div>
                                <div id="img6"></div>
                            </div>
                        </div>
                        <div class="slide">
                            <div id="grid-imgs">
                                <div id="img7"></div>
                                <div id="img8"></div>
                                <div id="img9"></div>
                            </div>
                        </div>
                        <!-- Repita o slide ou use conteúdo dinâmico para adicionar outros slides conforme necessário -->
                    </div>
                    <button class="prev" onclick="mudarSlide(-1)">&#10094;</button>
                    <button class="next" onclick="mudarSlide(1)">&#10095;</button>
                </div>
                <div class="indicadores">
                    <span class="indicador" onclick="mudarParaSlide(0)"></span>
                    <span class="indicador" onclick="mudarParaSlide(1)"></span>
                    <span class="indicador" onclick="mudarParaSlide(2)"></span>
                </div>
            </div>

            <section id="resumos-outras-pags">
                <div class="hr-gradiente"></div>
                <section id="section-cardapio">
                    <div id="textos-cardapio">
                        <h2>Cardápio Saboroso</h2>
                        <p>No PartyNet, a diversão não para nem na hora de comer! Oferecemos um cardápio delicioso e variado,
                            pensado especialmente para agradar o paladar dos pequenos e encantar os adultos. De lanches divertidos a
                            opções mais saudáveis, cada prato é preparado com carinho e ingredientes de qualidade, garantindo uma
                            experiência saborosa para toda a família. Conheça nossas opções e escolha o que mais combina com sua festa!</p>
                        <a href="cardapio.php"><button>Visitar Cardápio</button></a>
                    </div>
                    <div id="img-cardapio">
                        <img src="img/cardapio_inicio.jpg" alt="">
                    </div>
                </section>
                <div class="hr-gradiente"></div>
                <section id="section-lazer">
                    <div id="img-lazer">
                        <img src="img/atracao2.png" alt="">
                    </div>
                    <div id="textos-lazer">
                        <h2>Lazer e Diversão Garantida</h2>
                        <p>Por aqui o lazer é garantido com diversão para todas as idades! Nossos ambientes são preparados com brinquedos
                            seguros, modernos e atrações interativas, pensados para transformar o seu evento em um momento inesquecível. De áreas de
                            jogos a espaços criativos, cada detalhe é planejado para que as crianças aproveitem ao máximo, enquanto os adultos podem
                            relaxar e curtir junto. Venha viver momentos mágicos e surpreender seus convidados com uma experiência de lazer única!</p>
                        <a href="atracoes.php"><button>Visitar Atrações</button></a>
                    </div>
                </section>
                <div class="hr-gradiente"></div>
                <section id="section-orcfeed">
                    <div id="textos-orc">
                        <h2>Custo Benefício</h2>
                        <p>Solicitar um orçamento é o primeiro passo para tornar sua festa inesquecível! Na PartyNet, oferecemos pacotes
                            personalizados que se ajustam ao seu estilo e ao tema dos sonhos da criançada. Preencha o formulário e ajudaremos você a
                            planejar cada detalhe dessa data tão especial!</p>
                        <a href="orcamento.php"><button>Visitar Orçamento</button></a>
                    </div>
                    <div id="textos-feed">
                        <h2>Avaliações Positivas</h2>
                        <p>Nosso compromisso é oferecer momentos inesquecíveis e a melhor experiência possível. Sua opinião é essencial para
                            continuarmos aprimorando nossos serviços e garantindo sempre clientes satisfeitos. Compartilhe suas impressões e
                            ajude-nos a fazer cada festa ainda mais mágica e divertida!</p>
                        <a href="feedbacks.php"><button>Visitar Feedbacks</button></a>
                    </div>
                </section>
            </section>
            <section id="section-pos-grid">
                <div id="caixa-qs">
                    <h1>Quem somos?</h1>
                    <hr>
                    <p>Bem-vindos ao PartyNet, o lugar onde a magia das festas infantis ganha vida! Somos um buffet especializado
                        em transformar sonhos em realidade, criando momentos inesquecíveis para crianças e suas famílias. Nossa missão é
                        garantir que cada detalhe da festa seja especial, com muita diversão, segurança e, claro, muita farra!<br><br>
                        Com anos de experiência no mercado de eventos, oferecemos uma estrutura completa para festas de todos os tamanhos.
                        Desde decoração temática encantadora até atividades e brincadeiras personalizadas, nossa equipe dedica-se a
                        planejar e realizar a festa perfeita para cada pequeno aniversariante. No PartyNet, o sorriso das crianças
                        é nossa maior recompensa!<br><br>
                        Venha conhecer o nosso espaço, feito para crianças de todas as idades se divertirem com conforto e segurança, e
                        para os pais relaxarem sabendo que seus filhos estão nas melhores mãos. Vamos criar juntos momentos de pura
                        alegria e diversão!</p>
                </div>
            </section>
            <section id="mis-vis-val">
        <div id="banners">
            <div class="caixa-banner">
                <div class="banner" id="banner1">
                    <h5 class="mini-title" id="mini-title-gerenc">Missão</h5>
                    <img src="img/alvo.png" alt="">
                    <h5 class="mini-text" id="mini-text-gerenc">Proporcionar momentos inesquecíveis para crianças e famílias, oferecendo festas personalizadas com diversão, qualidade e segurança.</h5>
                    <a href=""></a>
                </div>
            </div>
            
            <div class="caixa-banner">
                <div class="banner" id="banner3">
                    <span style="font-size: 4em">
                        <i class="fa-solid fa-graduation-cap"></i>  
                    </span>
                    <h5 class="mini-title" id="mini-title-edu">Visão</h5>
                    <img src="img/olho.png" alt="">
                    <h5 class="mini-text" id="mini-text-edu">Ser reconhecido como o buffet infantil mais inovador e encantador da região, criando experiências únicas que deixem memórias felizes e duradouras para cada cliente.</h5>
                </div>
            </div>
            
            <div class="caixa-banner">
                <div class="banner" id="banner2">
                    <span style="font-size: 4em">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </span>
                    <h5 class="mini-title" id="mini-title-sim">Valores</h5>
                    <img src="img/diamante.png" alt="">
                    <h5 class="mini-text" id="mini-text-sim">Criatividade<br>Segurança<br>Qualidade<br>Empatia<br>Sustentabilidade<br>Diversão</h5>
                </div>
            </div>
            
        </div>
            </section>
        </div>
    </main>
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