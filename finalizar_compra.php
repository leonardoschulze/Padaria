<?php
session_start();
require 'db.php';

// Verifica se há itens no carrinho
if (empty($_SESSION['carrinho'])) {
    $_SESSION['erro'] = 'Não há itens no carrinho para finalizar';
    header('Location: carrinho.php');
    exit;
}

// Inicia transação
$conn->begin_transaction();

try {
    // 1. Calcula o total da venda
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    // 2. Insere a venda principal
    $sql_venda = "INSERT INTO vendas (total) VALUES (?)";
    $stmt_venda = $conn->prepare($sql_venda);
    $stmt_venda->bind_param("d", $total);
    $stmt_venda->execute();
    $venda_id = $conn->insert_id;

    // 3. Insere os itens vendidos
    $sql_item = "INSERT INTO itens_vendidos (venda_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
    $stmt_item = $conn->prepare($sql_item);
    
    foreach ($_SESSION['carrinho'] as $item) {
        $stmt_item->bind_param("iiid", $venda_id, $item['id'], $item['quantidade'], $item['preco']);
        $stmt_item->execute();
        
        // 4. Atualiza o estoque (opcional)
        $sql_estoque = "UPDATE produtos SET quantidade_estoque = quantidade_estoque - ? WHERE id = ?";
        $stmt_estoque = $conn->prepare($sql_estoque);
        $stmt_estoque->bind_param("ii", $item['quantidade'], $item['id']);
        $stmt_estoque->execute();
    }

    // Confirma a transação
    $conn->commit();
    
    // Limpa o carrinho
    unset($_SESSION['carrinho']);
    
    // Redireciona para página de sucesso
    $_SESSION['venda_id'] = $venda_id;
    header('Location: compra_sucesso.php');
    exit;

} catch (Exception $e) {
    // Em caso de erro, reverte a transação
    $conn->rollback();
    $_SESSION['erro'] = 'Erro ao finalizar compra: ' . $e->getMessage();
    header('Location: carrinho.php');
    exit;
}
?>