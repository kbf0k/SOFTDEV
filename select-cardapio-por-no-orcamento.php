<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id_sessao'])) {
    die("Você precisa estar logado para acessar esta página.");
}

$id_usuario = $_SESSION['id_sessao'];

$query = "
    SELECT id_cardapio, nome FROM cardapio WHERE id = ? 
    UNION
    SELECT id, 'Cardápio Personalizado' FROM cardapio_personalizado WHERE id_usuario = ?
";
$stmt = $conexao->prepare($query);

if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$stmt->bind_param("ii", $id_usuario, $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Nenhum cardápio encontrado para o usuário.";
}
?>

<div class="form-group">
    <label for="cardapio">Cardápio:</label>
    <select id="cardapio" name="cardapio" required>
        <option value="">Selecione...</option>
        <?php
        while ($row = $result->fetch_assoc()) {
            $nome = $row['nome'] ?: 'Cardápio Personalizado ' . $_SESSION['nome_sessao'];
            echo "<option value='" . $row['id_cardapio'] . "'>$nome</option>";
        }
        ?>
    </select>
</div>