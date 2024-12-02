<?php
session_start();
include 'config.php';

$id_usuario = $_SESSION['id_sessao']; // ID do usuário logado

// Obtém os dados JSON enviados
$dados = json_decode(file_get_contents('php://input'), true);

// Verifica se 'id_cardapio' está presente no JSON
if (isset($dados['id_cardapio'])) {
    $id_cardapio = $dados['id_cardapio']; // ID do cardápio escolhido

    // Tenta atualizar a escolha do cardápio do usuário
    $sql = "INSERT INTO usuario_cardapio (id_usuario, id_cardapio) 
            VALUES (?, ?) 
            ON DUPLICATE KEY UPDATE id_cardapio = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iii", $id_usuario, $id_cardapio, $id_cardapio);

    if ($stmt->execute()) {
        echo json_encode(["status" => "sucesso", "mensagem" => "Cardápio escolhido com sucesso!"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao escolher o cardápio: " . $stmt->error]);
    }
} else {
    echo json_encode(["status" => "erro", "mensagem" => "ID do cardápio não encontrado!"]);
}
?>
