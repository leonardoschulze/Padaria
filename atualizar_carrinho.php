<?php
session_start();

if (!isset($_POST['index']) || !isset($_POST['quantidade']) || !isset($_SESSION['carrinho'])) {
    $_SESSION['erro'] = 'Dados inválidos para atualização';
    header('Location: carrinho.php');
    exit;
}

$index = (int)$_POST['index'];
$quantidade = (int)$_POST['quantidade'];

if ($quantidade < 1) {
    $_SESSION['erro'] = 'A quantidade deve ser no mínimo 1';
    header('Location: carrinho.php');
    exit;
}

if (isset($_SESSION['carrinho'][$index])) {
    $_SESSION['carrinho'][$index]['quantidade'] = $quantidade;
    $_SESSION['sucesso'] = 'Quantidade atualizada com sucesso!';
} else {
    $_SESSION['erro'] = 'Item não encontrado no carrinho';
}

header('Location: carrinho.php');
exit;
?>