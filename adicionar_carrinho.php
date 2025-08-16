<?php

    include 'db.php';

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }

    $produto_id = $_POST['produto_id'];
    $produto_nome = $_POST['produto_nome'];
    $quantidade = (int)$_POST['quantidade'];

    $produto_existe = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if($item['produto_id'] == $produto_id) {
            $item['quantidade'] += $quantidade;
            $produto_existe = true;
            break;
        }
    }

    if (!$produto_existe) {
        $_SESSION['carrinho'][] = array(
            'produto_id' => $produto_id,
            'produto_nome' => $produto_nome,
            'quantidade' => $quantidade
        );
    }

    header('Location: home.php');
    exit;

    ?>