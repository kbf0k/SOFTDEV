<?php
session_start();
include_once('config.php');
$mensagem ='';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email_digitado = $_POST['email'];
    $senha_digitado = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param('s',$email_digitado);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){

        $sql_update = $conexao->prepare("UPDATE usuarios SET senha = ? WHERE email= ?");
        $sql_update->bind_param('ss',$senha_digitado,$email_digitado);

        if($sql_update->execute()){
            header('Location: index.php');
            exit();
        }
        else{
            echo 'Erro ao atualizar a senha';
        }
    }
    else{
        $mensagem = 'Email não encontrado';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueceu senha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/esqueceu.css">
    <script src="javascript/esqueceu.js" defer></script>
</head>

<body>
    <main>
        <div class="container">
            <a id="voltar" onclick="voltar()" >Voltar
                <img id="voltar-icone" src="img/voltar.png" alt="icone de voltar">
            </a>
            <h1>Recuperar senha</h1>
            <p>Digite o seu endereço de email abaixo para redefinir a sua senha.</p>
            <form action="" method="post">
                <div class="entrada">
                    <label for="email">Email <p style="color:red;"><?php echo $mensagem;?></p></label>
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
    </main>
</body>

</html>