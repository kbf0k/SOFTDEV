<?php
include_once('config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <!-- CSS BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cardapio.css">
    <script src="javascript/cardapio.js" defer></script>
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
            <h1 id="titulo">Cardápios</h1>
            <div class="menu-options">
                <!-- Cardápio 1 -->
                <div class="menu-card">
                    <?php

                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Clássico'";
                    $resultado = $conexao->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<h2>" . $linha["nome"] . "</h2>";

                            $itens = explode(",", $linha["descricao"]);
                            echo "<ul>";
                            foreach ($itens as $item) {
                                echo "<li>" . trim($item) . "</li>";
                            }
                            echo "</ul>";
                            $preco = $linha["preco"];
                        }
                    } else {
                        echo "Cardápio não encontrado.";
                    }
                    ?>
                    <!-- Alterei o id do carrossel -->
                    <div id="carouselCardapio1" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCardapio1" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCardapio1" data-slide-to="1"></li>
                            <li data-target="#carouselCardapio1" data-slide-to="2"></li>
                            <li data-target="#carouselCardapio1" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="menu-image d-block w-100" src="img/cardapioitem1.jpg" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem2.jpg" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem3.jpg" alt="Terceiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem4.jpg" alt="Quarto Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselCardapio1" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCardapio1" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                    <?php echo "<p class='menu-price'>R$ " . $preco . "</p>"; ?>
                    <button class="choose-menu">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 2 -->
                <div class="menu-card">
                    <?php
                    // Consultar o cardápio específico
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Gourmet'";
                    $resultado = $conexao->query($sql);

                    // Verificar se encontrou o cardápio
                    if ($resultado->num_rows > 0) {
                        // Exibir o cardápio
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<h2>" . $linha["nome"] . "</h2>";

                            // Quebrar a descrição em itens e exibir como lista
                            $itens = explode(",", $linha["descricao"]);
                            echo "<ul>";
                            foreach ($itens as $item) {
                                echo "<li>" . trim($item) . "</li>";
                            }
                            echo "</ul>";
                            $preco = $linha["preco"];
                        }
                    } else {
                        echo "Cardápio não encontrado.";
                    }
                    ?>
                    <!-- Alterei o id do carrossel -->
                    <div id="carouselCardapio2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCardapio2" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCardapio2" data-slide-to="1"></li>
                            <li data-target="#carouselCardapio2" data-slide-to="2"></li>
                            <li data-target="#carouselCardapio2" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="menu-image d-block w-100" src="img/cardapioitem5.jpg" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem6.jpg" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem7.jpg" alt="Terceiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image d-block w-100" src="img/cardapioitem8.webp" alt="Quarto Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselCardapio2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCardapio2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                    <?php echo "<p class='menu-price'>R$ " . $preco . "</p>"; ?>
                    <button class="choose-menu">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 3 -->
                <div class="menu-card">
                    <?php
                    // Consultar o cardápio específico
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Diversão'";
                    $resultado = $conexao->query($sql);

                    // Verificar se encontrou o cardápio
                    if ($resultado->num_rows > 0) {
                        // Exibir o cardápio
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<h2>" . $linha["nome"] . "</h2>";

                            // Quebrar a descrição em itens e exibir como lista
                            $itens = explode(",", $linha["descricao"]);
                            echo "<ul>";
                            foreach ($itens as $item) {
                                echo "<li>" . trim($item) . "</li>";
                            }
                            echo "</ul>";
                            $preco = $linha["preco"];
                        }
                    } else {
                        echo "Cardápio não encontrado.";
                    }
                    ?>
                    <div id="carouselCardapio3" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCardapio3" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCardapio3" data-slide-to="1"></li>
                            <li data-target="#carouselCardapio3" data-slide-to="2"></li>
                            <li data-target="#carouselCardapio3" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem9.jpg" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem1.jpg" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem2.jpg" alt="Terceiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem3.jpg" alt="Quarto Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselCardapio3" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCardapio3" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                    <?php echo "<p class='menu-price'>R$ " . $preco . "</p>"; ?>
                    <button class="choose-menu">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 4 -->
                <div class="menu-card">
                    <?php
                    // Consultar o cardápio específico
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Prime'";
                    $resultado = $conexao->query($sql);

                    // Verificar se encontrou o cardápio
                    if ($resultado->num_rows > 0) {
                        // Exibir o cardápio
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<h2>" . $linha["nome"] . "</h2>";

                            // Quebrar a descrição em itens e exibir como lista
                            $itens = explode(",", $linha["descricao"]);
                            echo "<ul>";
                            foreach ($itens as $item) {
                                echo "<li>" . trim($item) . "</li>";
                            }
                            echo "</ul>";
                            $preco = $linha["preco"];
                        }
                    } else {
                        echo "Cardápio não encontrado.";
                    }
                    ?>
                    <div id="carouselCardapio4" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCardapio4" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCardapio4" data-slide-to="1"></li>
                            <li data-target="#carouselCardapio4" data-slide-to="2"></li>
                            <li data-target="#carouselCardapio4" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem4.jpg" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem5.jpg" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem6.jpg" alt="Terceiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem7.jpg" alt="Quarto Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselCardapio4" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCardapio4" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                    <?php echo "<p class='menu-price'>R$ " . $preco . "</p>"; ?>
                    <button class="choose-menu">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 5: Personalizado -->
                <!-- <div class="menu-card"> -->
                <!-- Botão para abrir o modal -->
                <button id="open-modal" class="card">Personalizar Cardápio</button>
                <!-- </div> -->

                <!-- Modal para o cardápio personalizado -->
                <div id="custom-menu-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Personalize seu Cardápio</h2>
                        <form id="custom-menu-form">
                            <label for="massas">Escolha uma Massa:</label>
                            <select id="massas" name="massas">
                                <option value="Coxinha">Coxinha</option>
                                <option value="Bolinhas de queijo">Bolinhas de queijo</option>
                                <option value="Risole">Risole</option>
                            </select>

                            <label for="sorvetes">Escolha um Sorvete:</label>
                            <select id="sorvetes" name="sorvetes">
                                <option value="Chocolate">Chocolate</option>
                                <option value="Flocos">Flocos</option>
                                <option value="Morango">Morango</option>
                            </select>

                            <label for="bebidas">Escolha uma Bebida:</label>
                            <select id="bebidas" name="bebidas">
                                <option value="Refrigerante">Refrigerante</option>
                                <option value="Suco">Suco</option>
                                <option value="Água">Água</option>
                            </select>

                            <label for="sobremesas">Escolha uma Sobremesa:</label>
                            <select id="sobremesas" name="sobremesas">
                                <option value="Pudim">Pudim</option>
                                <option value="Bolo de Cenoura">Bolo de Cenoura</option>
                                <option value="Mini-tortas">Mini-tortas</option>
                            </select>

                            <label for="acompanhamento">Escolha seu Acompanhamento:</label>
                            <select id="acompanhamento" name="acompanhamento">
                                <option value="Pipoca">Pipoca</option>
                                <option value="Algodão Doce">Algodão Doce</option>
                                <option value="Gelatina">Gelatina</option>
                            </select>

                            <button type="button" id="save-custom-menu">Salvar Cardápio</button>
                        </form>
                    </div>
                </div>
                <!-- Cardápio 6 -->
                <div class="menu-card">
                    <?php
                    // Consultar o cardápio específico
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Festa'";
                    $resultado = $conexao->query($sql);

                    // Verificar se encontrou o cardápio
                    if ($resultado->num_rows > 0) {
                        // Exibir o cardápio
                        while ($linha = $resultado->fetch_assoc()) {
                            echo "<h2>" . $linha["nome"] . "</h2>";

                            // Quebrar a descrição em itens e exibir como lista
                            $itens = explode(",", $linha["descricao"]);
                            echo "<ul>";
                            foreach ($itens as $item) {
                                echo "<li>" . trim($item) . "</li>";
                            }
                            echo "</ul>";
                            $preco = $linha["preco"];
                        }
                    } else {
                        echo "Cardápio não encontrado.";
                    }
                    ?>
                    <div id="carouselCardapio6" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselCardapio6" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselCardapio6" data-slide-to="1"></li>
                            <li data-target="#carouselCardapio6" data-slide-to="2"></li>
                            <li data-target="#carouselCardapio6" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem8.webp" alt="Primeiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem9.jpg" alt="Segundo Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem2.jpg" alt="Terceiro Slide">
                            </div>
                            <div class="carousel-item">
                                <img class="menu-image" class="d-block w-100" src="img/cardapioitem4.jpg" alt="Quarto Slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselCardapio6" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselCardapio6" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                    <?php echo "<p class='menu-price'>R$ " . $preco . "</p>"; ?>
                    <button class="choose-menu">Escolher Cardápio</button>
                </div>
            </div>
            <!-- <div class="carrossel">
                <h2>Cardápios</h2>
                <p>Cardápios diferenciados, para atender diferentes tipos de clientes, com qualidade e excelência.</p>
                <div class="carrossel-container">
                    <div class="carrossel-slide">
                        <img src="img/cardapioitem1.jpg" alt="Comida 1">
                        <img src="img/cardapioitem2.jpg" alt="Comida 2">
                        <img src="img/cardapioitem3.jpg" alt="Comida 3">
                        <img src="img/cardapioitem4.jpg" alt="Comida 4">
                        <img src="img/cardapioitem5.jpg" alt="Comida 5">
                        <img src="img/cardapioitem6.jpg" alt="Comida 6">
                    </div>
                </div>
                <div class="carrossel-indicators">
                    <span class="dot active"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <div class="controladores">
                    <button class="setas" id="prev"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                    <button class="setas" id="next"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </div>
            </div> -->
        </div>
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
    <!-- JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>