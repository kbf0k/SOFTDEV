<?php
include_once('config.php');
session_start();

// Consulta SQL para pegar os 4 depoimentos mais recentes
$sql = "SELECT nome, mensagem, data FROM depoimentos ORDER BY data DESC LIMIT 4";

// Executa a consulta
$result = $conexao->query($sql);

// Verifica se há depoimentos
if ($result->num_rows > 0) {
    // Cria um array para armazenar os depoimentos
    $depoimentos = array();

    // Loop para recuperar cada depoimento
    while ($row = $result->fetch_assoc()) {
        $depoimentos[] = $row;
    }

    // Retorna os depoimentos como um JSON
    echo json_encode($depoimentos);
} else {
    // Caso não haja depoimentos
    echo json_encode([]);
}
?>
