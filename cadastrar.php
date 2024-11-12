<?php
session_start();
include_once('config.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['data']) && isset($_POST['email']) && isset($_POST['senha'])){
            
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $data_nasc = $_POST['data'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios(nome,sobrenome,data_nasc,email,senha) VALUES(?,?,?,?,?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param('sssss',$nome,$sobrenome,$data_nasc,$email,$senha);
            $stmt->execute();
            $result = $stmt->get_result();
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/cadastrar.css">
    <script src="javascript/cadastrar.js" defer></script>
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
                <h1>Bem vindo ao</h1>
                <h1>FUN FARRA KIDS</h1>
                <p><b>Cadastre-se agora para criar momentos mágicos e inesquecíveis.</b></p>
                <p id="p2">Ao se cadastrar, você terá acesso exclusivo às nossas promoções, poderá agendar festas com
                    facilidade e
                    acompanhar todas as novidades do nosso buffet infantil. Queremos fazer parte das suas celebrações
                    especiais, proporcionando diversão e alegria para as crianças e tranquilidade para os pais. Não
                    perca
                    tempo, cadastre-se e comece a planejar a festa dos sonhos hoje mesmo!
                </p>
                <img id="logo" src="../img/partynet_img.png" alt="Logo">
            </div>
            <div class="box2">
                <div id="voltar-container">
                    <a id="voltar" onclick="voltar()">Voltar
                        <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
                    </a>
                </div>
                <h1>CADASTRAR</h1>
                <p>Digite os seus dados de acesso no campo abaixo</p>
                <form action="" method="POST" onsubmit="return verificarsenha()">
                    <div class="entrada">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
                    </div>
                    <div class="entrada">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" name="sobrenome" id="sobrenome" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="entrada">
                        <label for="sobrenome">Data de Nascimento</label>
                        <input type="date" name="data" id="data" placeholder="Digite sua data de Nascimento" required>
                    </div>
                    <div class="entrada">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="@email.com" required>
                    </div>
                    <div class="entrada">
                        <label for="password">Criar Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="*****" required>
                    </div>
                    <div class="entrada">
                        <label for="password" style="margin:0;">Repetir senha</label>
                        <input type="password" name="repetir-senha" id="repetir=senha" placeholder="*****" required >
                    </div>
                    <button type="submit" name="submit" id="submit">ENTRAR</button>
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