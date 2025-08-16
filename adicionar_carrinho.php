<?php
session_start();
require 'db.php'; 

if (!isset($_POST['produto_id'])) {
    header('Location: home.php');
    exit;
}

$produto_id = (int)$_POST['produto_id'];
$sql = "SELECT preco FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $produto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: home.php');
    exit;
}

$produto = $result->fetch_assoc();
$preco = (float)$produto['preco'];

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$item = [
    'id' => $produto_id,
    'nome' => $_POST['produto_nome'],
    'preco' => $preco, 
    'quantidade' => isset($_POST['quantidade']) ? (int)$_POST['quantidade'] : 1,
    'imagem' => $_POST['produto_imagem'] ?? ''
];

$produtoExiste = false;
foreach ($_SESSION['carrinho'] as &$itemCarrinho) {
    if ($itemCarrinho['id'] === $item['id']) {
        $itemCarrinho['quantidade'] += $item['quantidade'];
        $produtoExiste = true;
        break;
    }
}

if (!$produtoExiste) {
    $_SESSION['carrinho'][] = $item;
}

$conn->close();
header('Location: home.php');
exit;
?>