<?php
session_start();
if (!isset($_SESSION['venda_id'])) {
    header('Location: home.php');
    exit;
}

$venda_id = $_SESSION['venda_id'];
unset($_SESSION['venda_id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Compra Finalizada - Padaria Pão e Confia</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>   /* Não sei o motivo, mas esses estilos não estavam pegando quando eu mudava eles no arquivo CSS, então coloquei diretamente aqui */
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

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3 class="mb-0">Compra Finalizada com Sucesso!</h3>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                <h4 class="alert-heading">Obrigado por sua compra!</h4>
                <p>Seu pedido #<?= $venda_id ?> foi registrado com sucesso.</p>
                <hr>
                <p class="mb-0">Você receberá um e-mail com os detalhes da compra.</p>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <a href="home.php" class="btn btn-voltar-carrinho mt-3"> 
                    <i class="fas fa-home"></i> Voltar à Página Inicial
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>