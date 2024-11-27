<?php
session_start();
include 'config.php';

$precos = [
    "massas" => 30.00,
    "bebidas" => 15.00,
    "sobremesas" => 25.00,
    "sorvetes" => 12.50,
    "acompanhamento" => 17.25
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['id_sessao'])) {
        die("Você precisa estar logado para personalizar o cardápio.");
    }

    $id_usuario = $_SESSION['id_sessao'];
    $itens = $_POST['itens'];
    $preco_total = 0;

    // Calcular o preço total somando os valores de cada item
    foreach ($itens as $item) {
        [$categoria, $comida] = explode('|', $item);
        $preco_total += $precos[$categoria];
        }
        
        // Converter os itens selecionados para JSON
        $itens_json = json_encode($itens);
        
        // Inserir no banco de dados (uma linha por cardápio personalizado)
        $stmt = $conexao->prepare("
        INSERT INTO cardapio_personalizado (id_usuario, itens, preco_total)
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE
        itens = VALUES(itens),
        preco_total = VALUES(preco_total)
        ");
        
        if (!$stmt) {
           die("Erro na preparação da consulta: " . $conexao->error);
        }
        
        $stmt->bind_param("ssd", $id_usuario, $itens_json, $preco_total);
        
        if ($stmt->execute()) {
           header("Location: cardapio.php?salvo=sucesso");
           exit;
        } else {
           echo "Erro ao salvar o cardápio: " . $stmt->error;
        }
    }
?>