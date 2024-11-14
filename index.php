<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email_digitado = $_POST['email_login'];
    $senha_digitada = md5($_POST['senha_login']);

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email_usuario = ? AND senha_usuario = ?");
    $stmt->bind_param('ss', $email_digitado,$senha_digitada);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $usuario_logado = $result->fetch_assoc();
        $_SESSION['nome_sessao'] = $usuario_logado['nome_usuario'];
        header('Location: inicio.php');
        exit();
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
            <img id="logo" src="img/partynet_img.png" alt="Logo">
            <h1>ENTRAR</h1>
            <form action="" method="post">
                <div class="entrada">
                    <label for="email">Email</label>
                    <input type="email"
                        name="email_login" id="email" placeholder="@email.com" required>
                </div>
                <div class="entrada">
                    <label for="password">Senha</label>
                    <input type="password"
                        name="senha_login" id="password" placeholder="*****" required>
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