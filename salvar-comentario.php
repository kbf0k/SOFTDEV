<?php
include_once('config.php');
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_sessao'])) {
    echo "Você precisa estar logado para enviar um comentário.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_SESSION['id_sessao']; // ID do usuário logado
    $comentario = trim($_POST['comentario'] ?? '');

    // Validações
    if (empty($comentario)) {
        echo "O comentário não pode estar vazio.";
        exit;
    }

    // Insere os dados na tabela de comentários
    try {
        $sql = "INSERT INTO comentarios (id_usuario, comentario) VALUES (?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$usuario_id, $comentario]);

        header("Location: feedbacks.php");
        exit;
    } catch (Exception $e) {
        // Mostra erro em modo de desenvolvimento (ou loga o erro em produção)
        echo "Ocorreu um erro ao salvar o comentário: " . $e->getMessage();
        exit;
    }
}
?>
