<?php
session_start();

if (!isset($_GET['index'])) {
    $_SESSION['erro'] = 'Item não especificado para remoção';
    header('Location: carrinho.php');
    exit;
}

$index = (int)$_GET['index'];

if (isset($_SESSION['carrinho']) && isset($_SESSION['carrinho'][$index])) {

    unset($_SESSION['carrinho'][$index]);
    

    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    
    $_SESSION['sucesso'] = 'Produto removido do carrinho!';
} else {
    $_SESSION['erro'] = 'Item não encontrado no carrinho';
}

header('Location: carrinho.php');
exit;
?>