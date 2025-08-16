<?php
session_start();
?>

<html lang="pt-BR">
<head>
  <title>Carrinho - Padaria Pão e Confia</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .table img {
      max-width: 80px;
      height: auto;
    }
    .input-group-quantidade {
      width: 120px;
    }
  </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="#">Padaria Pão e Confia
      <i class="fas fa-coffee me-2"></i>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="home.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobrenos.php">Sobre nós</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrinho.php">Carrinho (<?php echo isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : 0 ?>)</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2>Seu Carrinho de Compras</h2>
  
  <?php if (empty($_SESSION['carrinho'])): ?>
    <div class="alert alert-info">Seu carrinho está vazio.</div>
    <a href="home.php" class="btn btn-primary">Voltar aos Produtos</a>
  <?php else: ?>
    <table class="table">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Preço Unitário</th>
          <th>Quantidade</th>
          <th>Subtotal</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $total = 0;
        foreach ($_SESSION['carrinho'] as $index => $item): 
          $subtotal = $item['preco'] * $item['quantidade'];
          $total += $subtotal;
        ?>
        <tr>
          <td>
            <?php if (!empty($item['imagem'])): ?>
            <?php endif; ?>
            <?= htmlspecialchars($item['nome']) ?>
          </td>
          <td>R$ <?= number_format($item['preco'], 2, ',', '.') ?></td>
          <td>
            <form method="post" action="atualizar_carrinho.php" class="d-inline">
              <input type="hidden" name="index" value="<?= $index ?>">
              <div class="input-group input-group-quantidade">
                <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1" class="form-control">
                <button type="submit" class="btn btn-outline-primary">Atualizar</button>
              </div>
            </form>
          </td>
          <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
          <td>
            <a href="remover_carrinho.php?index=<?= $index ?>" class="btn btn-outline-danger">
              <i class="fas fa-trash-alt"></i> Remover
            </a>
          </td>
        </tr>
        <?php endforeach; ?>
        <tr class="table-active">
          <td colspan="3" class="text-end"><strong>Total:</strong></td>
          <td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    
    <div class="d-flex justify-content-between mt-4">
      <a href="home.php" class="btn btn-secondary">Continuar Comprando</a>
      <a href="finalizar_compra.php" class="btn btn-success">Finalizar Compra</a>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>