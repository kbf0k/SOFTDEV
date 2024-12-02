<?php
session_start();
include_once('config.php');
$mensagem = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email_digitado = $_POST['email'];
    $senha_digitado = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email_usuario = ?");
    $stmt->bind_param('s', $email_digitado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $sql_update = $conexao->prepare("UPDATE usuarios SET senha_usuario = ? WHERE email_usuario= ?");
        $sql_update->bind_param('ss', $senha_digitado, $email_digitado);

        if ($sql_update->execute()) {
            header('Location: index.php');
            exit();
        } else {
            echo 'Erro ao atualizar a senha';
        }
    } else {
        $mensagem = true;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu senha</title>
    <link rel="stylesheet" href="css/esqueceu.css">
    <script src="javascript/esqueceu.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <main>
        <div class="container">
            <a id="voltar" onclick="voltar()">Voltar
                <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
            </a>
            <h1>RECUPERAR SENHA</h1>
            <form action="" method="post">
                <div class="entrada">
                    <label for="email">Email </label>
                    <input type="email" name="email" id="email" placeholder="@email.com" required>
                </div>
                <div class="entrada">
                    <label for="senha">Redefinir Senha</label>
                    <input type="password" name="senha" id="redefinir_senha" placeholder="*****" required>
                </div>
                <button type="submit" name="submit">ENVIAR</button>
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
        <script>
        <?php if ($mensagem): ?> 
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Email não encontrado",
                confirmButtonColor: "#6334B1"
            });
            <?php endif; ?>
        </script>
    </main>
</body>

</html>