<?php
session_start();
include 'config.php'; // Inclua a conexão com o banco de dados

// Preços fixos para cada categoria
$precos = [
    "massas" => 30.00,
    "bebidas" => 15.00,
    "sobremesas" => 25.00,
    "sorvetes" => 12.50,
    "acompanhamento" => 17.25
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifique se o usuário está logado
    if (!isset($_SESSION['id_sessao'])) {
        die("Você precisa estar logado para personalizar o cardápio.");
    }

    $id_usuario = $_SESSION['id_sessao'];
    $itens = $_POST['itens']; // Recebe todos os itens selecionados
    $preco_total = 0;

    // Calcular o preço total somando os valores de cada item
    foreach ($itens as $item) {
        [$categoria, $comida] = explode('|', $item); // "massas|Coxinha"
        $preco_total += $precos[$categoria];
    }

    // Inserir no banco de dados (uma linha por cardápio personalizado)
    $itens_json = json_encode($itens); // Armazena todos os itens como JSON
    $stmt = $conexao->prepare("INSERT INTO cardapio_personalizado (id_usuario, itens, preco_total) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $id_usuario, $itens_json, $preco_total);

    if ($stmt->execute()) {
        echo "Cardápio personalizado salvo com sucesso!";
    } else {
        echo "Erro ao salvar o cardápio: " . $stmt->error;
    }
}
?>