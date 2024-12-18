<?php
include_once('config.php');
session_start();
if (!isset($_SESSION['nome_sessao'])) {
    $usuario_logado = false;
}

if (isset($_GET['salvo']) && $_GET['salvo'] === 'sucesso') {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cardápio salvo com sucesso!',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        });
    </script>
    ";
}

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
    <script>
        const usuarioLogado = <?php echo json_encode($usuario_logado); ?>;

        document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('custom-menu-modal');
    const openModalBtn = document.getElementById('open-modal');
    const closeModalBtn = document.getElementsByClassName('close')[0];
    const usuarioLogado = <?php echo json_encode($usuario_logado); ?>; // Recebendo o valor do PHP

    // Função para abrir o modal
    openModalBtn.onclick = function () {
        if (!usuarioLogado) {
            Swal.fire({
                icon: 'warning',
                title: 'Acesso restrito',
                text: 'Você precisa de uma conta para personalizar um cardápio.'
            });
            return;
        }
        modal.style.display = 'block';
    };

    // Função para fechar o modal
    closeModalBtn.onclick = function () {
        modal.style.display = 'none';
    };

    // Fechar o modal se o usuário clicar fora do conteúdo do modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    document.querySelectorAll('.choose-menu').forEach(button => {
        button.addEventListener('click', () => {
            if (!usuarioLogado) { // Comparação correta para verificar se está logado
                Swal.fire({
                    icon: 'warning',
                    title: 'Acesso restrito',
                    text: 'Você precisa de uma conta para escolher um cardápio.'
                });
                return;
            }

            const idCardapio = button.getAttribute('data-id');

            // Enviar a escolha para o PHP
            fetch('escolher_cardapio.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id_cardapio: idCardapio })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === "sucesso") {
                        Swal.fire("Sucesso", data.mensagem, "success");
                    } else {
                        Swal.fire("Erro", data.mensagem, "error");
                    }
                })
                .catch(error => {
                    Swal.fire("Erro", "Houve um problema ao processar a sua solicitação.", "error");
                });
        });
    });
});

    </script>
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
                    <button class="choose-menu" data-id="1">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 2 -->
                <div class="menu-card">
                    <?php

                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Gourmet'";
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
                    <button class="choose-menu" data-id="2">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 3 -->
                <div class="menu-card">
                    <?php
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Diversão'";
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
                    <button class="choose-menu" data-id="3">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 4 -->
                <div class="menu-card">
                    <?php
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Prime'";
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
                    <button class="choose-menu" data-id="4">Escolher Cardápio</button>
                </div>

                <!-- Cardápio 5: Personalizado -->
                <!-- <div class="menu-card"> -->
                <!-- Botão para abrir o modal -->
                <button id="open-modal" class="card">Personalizar Cardápio</button>
                <!-- </div> -->
                    <!-- <a href="select-cardapio-por-no-orcamento.php">aaa</a> -->
                <!-- Modal para o cardápio personalizado -->
                <div id="custom-menu-modal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Personalize seu Cardápio</h2>
                        <form id="custom-menu-form" method="POST" action="salvar_cardapio.php">
                            <div id="selections-container">
                                <!-- Seleção inicial -->
                                <div class="menu-item">
                                    <label for="item-1">Escolha um Item:</label>
                                    <select name="itens[]" class="menu-select">
                                        <option value="massas|Coxinha">Coxinha</option>
                                        <option value="massas|Bolinhas de queijo">Bolinha de queijo</option>
                                        <option value="massas|Risole">Risole</option>
                                        <option value="sorvetes|Chocolate">Sorvete de Chocolate</option>
                                        <option value="sorvetes|Flocos">Sorvete de Flocos</option>
                                        <option value="sorvetes|Morango">Sorvete de Morango</option>
                                        <option value="bebidas|Refrigerante">Refrigerante</option>
                                        <option value="bebidas|Suco">Suco</option>
                                        <option value="bebidas|Água">Água</option>
                                        <option value="sobremesas|Pudim">Pudim</option>
                                        <option value="sobremesas|Bolo de Cenoura">Bolo de Cenoura</option>
                                        <option value="sobremesas|Mini-tortas">Mini-tortas</option>
                                        <option value="acompanhamento|Pipoca">Pipoca</option>
                                        <option value="acompanhamento|Algodão Doce">Algodão Doce</option>
                                        <option value="acompanhamento|Gelatina">Gelatina</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="button" id="add-item">Adicionar Mais</button>
                            <button type="submit" id="save-custom-menu">Salvar Cardápio</button>
                        </form>

                    </div>
                </div>
                <!-- Cardápio 6 -->
                <div class="menu-card">
                    <?php
                    $sql = "SELECT nome, descricao, preco FROM cardapio WHERE nome = 'Cardápio Kids Festa'";
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
                    <button class="choose-menu" data-id="6">Escolher Cardápio</button>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="footer-section">
                <img src="img/partynet_img.png" alt="TDA Logo" class="footer-logo">
            </div>
            <div class="footer-section">
                <h4>Buffet PartyNet</h4>
                <p>O Buffet PartyNet convida você a celebrar sua festa conosco. Oferecemos brinquedos incríveis que
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
            &copy; Buffet Infantil PartyNet. Todos os direitos reservados.
        </div>
    </footer>
    <!-- JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>