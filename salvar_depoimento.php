<?php
include_once('config.php');
session_start();

// Verifica se o usuário está logad
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];
    $data = $_POST['data'];
    $usuario_id = $_SESSION['id_sessao']; 

    // Validações básicas
    if (empty($nome) || empty($mensagem) || empty($data)) {
        echo "Todos os campos devem ser preenchidos.";
        exit;
    }

    // Insere os dados na tabela de depoimentos
    $sql = "INSERT INTO depoimentos (id_usuario, nome, mensagem, data) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$usuario_id, $nome, $mensagem, $data]);

    // Redireciona para a página de feedbacks após salvar o depoimento
    header("Location: feedbacks.php");
    exit;
}
?>
