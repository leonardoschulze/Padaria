<?php
session_start();
?>

<html lang="pt-BR">
<head>
  <title>Carrinho - Padaria Pão e Confia</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>   /* Não sei o motivo, mas esses estilos não estavam pegando quando eu mudava eles no arquivo CSS, então coloquei diretamente aqui */
    .table img {
      max-width: 80px;
      height: auto;
    }
    .input-group-quantidade {
      width: 120px;
    }
      .alert-carrinho-vazio {
    background-color: #FFF3CD !important;
    border-color: #FFEEBA !important;
    color: #856404 !important;
  }
  
  .btn-voltar-carrinho {
    background-color: #6C757D !important;
    color: white !important;
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
    <div class="alert alert-carrinho-vazio d-flex align-items-center">
  <i class="fas fa-shopping-cart me-3"></i>
  <div>Seu carrinho está vazio.</div>
</div>
<a href="home.php" class="btn btn-voltar-carrinho mt-3">
  <i class="fas fa-arrow-left me-2"></i> Voltar aos Produtos
</a>
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
          <form method="post" action="atualizar_carrinho.php" class="d-inline-flex">
            <input type="hidden" name="index" value="<?= $index ?>">
            <input type="number" name="quantidade" 
                  value="<?= $item['quantidade'] ?>" 
                  min="1" 
                  class="form-control form-control-sm" 
                  style="width: 70px;">
            <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
              <i class="fas fa-sync-alt"></i> Atualizar
            </button>
          </form>
          </td>
          <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
          <td>
            <td>
              <a href="remover_carrinho.php?index=<?= $index ?>" class="btn btn-outline-danger" onclick="return confirm('Tem certeza que deseja remover este item?')">
                <i class="fas fa-trash-alt"></i> Remover
              </a>
            </td>
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