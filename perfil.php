<?php
include_once('config.php');
session_start();

if (!isset($_SESSION['nome_sessao'])) {
    header('Location: index.php');
    exit();
}

$id_usuario = $_SESSION['id_sessao'];

// Busca informações do usuário no banco de dados
$sql = "SELECT nome_usuario, sobrenome_usuario, email_usuario FROM usuarios WHERE id_usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$stmt->bind_result($nome, $sobrenome, $email);
$stmt->fetch();
$stmt->close();

// Atualiza dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $novo_nome = $_POST['nome'];
    $novo_sobrenome = $_POST['sobrenome'];
    $novo_email = $_POST['email'];
    $_SESSION['nome_sessao'] = $novo_nome;

    // Verifica se houve alguma alteração
    if ($novo_nome == $nome && $novo_sobrenome == $sobrenome && $novo_email == $email) {
        // Caso não haja alteração, define uma mensagem de erro
        $_SESSION['error_message'] = 'Por favor, altere ao menos um campo para atualizar seu perfil.';
        header('Location: perfil.php');
        exit();
    }

    $sql_update = "UPDATE usuarios SET nome_usuario = ?, sobrenome_usuario = ?, email_usuario = ? WHERE id_usuario = ?";
    $stmt = $conexao->prepare($sql_update);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("sssi", $novo_nome, $novo_sobrenome, $novo_email, $id_usuario);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = 'editado';
        header('Location: perfil.php');
        exit();
    } else {
        echo "Erro ao atualizar o perfil.";
    }
    $stmt->close();
}

// Deletar conta do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Excluir primeiro os registros relacionados em usuario_cardapio
    $sql_delete_related = "DELETE FROM usuario_cardapio WHERE id_usuario = ?";
    $stmt = $conexao->prepare($sql_delete_related);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->close();

    // Agora, excluir o usuário da tabela usuarios
    $sql_delete = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexao->prepare($sql_delete);

    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("i", $id_usuario);

    if ($stmt->execute()) {
        session_destroy();
        $_SESSION['success_message'] = 'deletado';
        header('Location: index.php');
        exit();
    } else {
        echo "Erro ao deletar a conta: " . $stmt->error;
    }
    $stmt->close();
}

$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <!-- CSS BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/perfil.css">
    <script src="javascript/perfil.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script>
    // SweetAlert para exclusão e mensagens de sucesso ou erro
    document.addEventListener('DOMContentLoaded', function () {
        var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>";
        var errorMessage = "<?php echo isset($_SESSION['error_message']) ? $_SESSION['error_message'] : ''; ?>";

        // Alerta de exclusão
        document.getElementById('delete-account-btn').addEventListener('click', function () {
            Swal.fire({
                title: "Tem certeza?",
                text: "Essa ação não pode ser desfeita. Deseja realmente excluir sua conta?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Enviar o formulário via JavaScript para excluir a conta
                    document.getElementById('delete-form').submit();
                }
            });
        });

        // Alerta de sucesso ou edição
        if (successMessage === "editado") {
            Swal.fire({
                title: "Perfil atualizado!",
                text: "O perfil foi atualizado com sucesso.",
                icon: "success",
                confirmButtonColor: "#4b3f35"
            }).then(() => {
                <?php unset($_SESSION['success_message']); ?>
                location.href = location.href;
            });
        } else if (successMessage === "deletado") {
            Swal.fire({
                title: "Conta deletada!",
                text: "Sua conta foi deletada com sucesso.",
                icon: "success",
                confirmButtonColor: "#4b3f35"
            }).then(() => {
                <?php unset($_SESSION['success_message']); ?>
                window.location.href = 'inicio.php';  // Redireciona após a exclusão
            });
        }

        // Alerta de erro
        if (errorMessage) {
            Swal.fire({
                title: "Erro!",
                text: errorMessage,
                icon: "error",
                confirmButtonColor: "#d33"
            }).then(() => {
                <?php unset($_SESSION['error_message']); ?>
            });
        }
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
        <section class="politica">
        <a id="voltar" onclick="voltar()">
                <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
        </a>
            <h2 id="editar">Editar Perfil</h2>
            <form method="POST" action="perfil.php">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>
                <div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" name="sobrenome" id="sobrenome" value="<?php echo htmlspecialchars($sobrenome); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                <div class="form-group">
                <a href="esqueceu.php"><button type="button" class="btn">Redefinir Senha</button></a>
                </div>
                <button id="att-profile" type="submit" name="update" class="btn">Atualizar perfil</button>
            </form>

            <h2>Excluir conta</h2>
            <form id="delete-form" method="POST" action="perfil.php" style="display: none;">
                <input type="hidden" name="delete" value="true">
            </form>
            <button type="button" id="delete-account-btn" class="btn delete">Excluir conta</button>
        </section>
    </section>
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
</body>