<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id_sessao'])) {
    die("Você precisa estar logado para acessar esta página.");
}

$id_usuario = $_SESSION['id_sessao'];
echo "ID do usuário logado: " . $id_usuario;

$query = "
    SELECT c.id_cardapio, c.nome 
    FROM usuario_cardapio u
    JOIN cardapio c ON u.id_cardapio = c.id_cardapio
    WHERE u.id_usuario = ?
    
    UNION
    
    SELECT NULL AS id_cardapio, 'Cardápio Personalizado' AS nome
    FROM cardapio_personalizado u
    WHERE u.id_usuario = ?
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
            $nome = $row['nome'];
            $id_cardapio = $row['id_cardapio']; // ID do cardápio ou NULL se for "Cardápio Personalizado"
            echo "<option value='" . ($id_cardapio ? $id_cardapio : '') . "'>$nome</option>";
        }
        ?>
    </select>
</div>
