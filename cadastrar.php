<?php
session_start();
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_digitado = $_POST['nome_cadastro'];
    $sobrenome_digitado = $_POST['sobrenome_cadastro'];
    $data_nasc_digitado = $_POST['data_cadastro'];
    $email_digitado = $_POST['email_cadastro'];
    $senha_digitado = md5(($_POST['senha_cadastro']));

    $stmt = $conexao->prepare("INSERT INTO usuarios(nome_usuario,sobrenome_usuario,data_nasc_usuario,email_usuario,senha_usuario) VALUES(?,?,?,?,?)");
    $stmt->bind_param('sssss', $nome_digitado, $sobrenome_digitado, $data_nasc_digitado, $email_digitado, $senha_digitado);
    $stmt->execute();
    $result = $stmt->get_result();
    sleep(4);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="stylesheet" href="css/cadastrar.css">
    <script src="javascript/cadastrar.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
</head>

<body>
    <main>
        <div class="container">
            <div class="box1">
                <div id="voltar-container-mobile">
                    <a id="voltar2" onclick="voltar()">Voltar
                        <img id="voltar-icone2" src="img/voltar.png" alt="icone de voltar">
                    </a>
                </div>
                <h1>BEM-VINDO AO</h1>
                <h1>PARTYNET!</h1>
                <p><b>Cadastre-se agora para criar momentos mágicos e inesquecíveis.</b></p>
                <p id="p2">Ao se cadastrar, você terá acesso exclusivo às nossas promoções, poderá agendar festas com
                    facilidade e
                    acompanhar todas as novidades do nosso buffet infantil. Queremos fazer parte das suas celebrações
                    especiais, proporcionando diversão e alegria para as crianças e tranquilidade para os pais. Não
                    perca
                    tempo, cadastre-se e comece a planejar a festa dos sonhos hoje mesmo!
                </p>
                <img id="logo" src="img/partynet_img.png" alt="Logo">
            </div>
            <div class="box2">
                <div id="voltar-container">
                    <a id="voltar" onclick="voltar()">Voltar
                        <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
                    </a>
                </div>
                <h1>CADASTRAR</h1>
                <form action="" method="POST" id="cadastrar">
                    <div class="entrada">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome_cadastro" id="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="entrada">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome_cadastro" id="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="entrada">
                        <label for="sobrenome">Data de Nascimento</label>
                        <input type="date" name="data_cadastro" id="data" placeholder="Digite sua data de Nascimento" required>
                    </div>
                    <div class="entrada">
                        <label for="email">Email</label>
                        <input type="email" name="email_cadastro" id="email" placeholder="@email.com" required>
                    </div>
                    <div class="entrada">
                        <label for="password">Criar Senha</label>
                        <input type="password" name="senha_cadastro" id="senha" placeholder="*****" required>
                    </div>
                    <div class="entrada">
                        <label for="password" style="margin:0;">Repetir senha</label>
                        <input type="password" name="repetir-senha" id="repetir_senha" placeholder="*****" required>
                    </div>
                    <button type="submit" name="submit" id="submit">CADASTRAR</button>
                </form>
            </div>
        </div>
        <div class="baloes">
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
            <div class="balao"></div>
        </div>
    </main>
</body>

</html>