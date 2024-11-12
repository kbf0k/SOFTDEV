<?php
session_start();
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $senha_digitada = $_POST['senha']; 

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $usuario_logado = $result->fetch_assoc();

            $senha_hash = $usuario_logado['senha'];

            if (password_verify($senha_digitada, $senha_hash)) {
                
                $_SESSION['nome_sessao'] = $usuario_logado['nome_sessao'];
                $_SESSION['tipo_sessao'] = $usuario_logado['tipo_sessao'];
                header('Location: ./html/inicio.html');
                exit();
            } 
        }
    }
?>


<!DOCTYPE html>
<html lang="Pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="javascript/login.js" defer></script>
</head>

<body>
    <main id="login">
        <div class="container">
            <img id="logo" src="../img/partynet_img.png" alt="Logo">

            <div id="voltar-container">
                <a id="voltar">Voltar
                    <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
                </a>
            </div>
            <h1>LOGIN</h1>
            <p>Digite os seus dados de acesso no campo abaixo</p>
            <form action="" method="post">
                <div class="entrada">
                    <label for="email">Email</label>
                    <input  type="email"
                        name="email" id="email" placeholder="@email.com" required>
                </div>
                <div class="entrada">
                    <label for="password">Senha</label>
                    <input  type="password"
                        name="senha" id="password" placeholder="*****" required>
                </div>
                <div class="lembrar">
                    <a href="esqueceu.php">Esqueceu senha?</a>
                </div>
                <button type="submit" name="submit">ENTRAR</button>
                <div class="cadastrar">
                    <p>Não tem uma conta? <a href="cadastrar.php">Inscrever-se</a></p>
                </div>
            </form>
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