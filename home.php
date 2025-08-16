<?php
session_start();
require 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
$produtos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Padaria Pão e Confia</title>
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
  <div class="row">
    
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
         <img src="../Padaria/imagem/pao-frances-12h-gg.png.webp" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Pão</h5>
          <h5 class="preco">R$ 0,50</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="1">
            <input type="hidden" name="produto_nome" value="Pão">
            <input type="hidden" name="produto_preco" value="0.50">
            <input type="hidden" name="produto_imagem" value="pao.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/paoqueijo.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Pão de Queijo</h5>
          <h5 class="preco">R$ 2,50</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="2">
            <input type="hidden" name="produto_nome" value="Pão de Queijo">
            <input type="hidden" name="produto_preco" value="2.50">
            <input type="hidden" name="produto_imagem" value="pao-queijo.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 3: Pastel -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/pastel.avif" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Pastel</h5>
          <h5 class="preco">R$ 4,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="3">
            <input type="hidden" name="produto_nome" value="Pastel">
            <input type="hidden" name="produto_preco" value="4.00">
            <input type="hidden" name="produto_imagem" value="pastel.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 4: Cuca -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/cuca.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Cuca</h5>
          <h5 class="preco">R$ 15,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="4">
            <input type="hidden" name="produto_nome" value="Cuca">
            <input type="hidden" name="produto_preco" value="15.00">
            <input type="hidden" name="produto_imagem" value="cuca.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 5: Bolo -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/bolo.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Bolo</h5>
          <h5 class="preco">R$ 10,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="5">
            <input type="hidden" name="produto_nome" value="Bolo">
            <input type="hidden" name="produto_preco" value="10.00">
            <input type="hidden" name="produto_imagem" value="bolo.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 6: Sonho -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/sonho.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Sonho</h5>
          <h5 class="preco">R$ 3,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="6">
            <input type="hidden" name="produto_nome" value="Sonho">
            <input type="hidden" name="produto_preco" value="3.00">
            <input type="hidden" name="produto_imagem" value="sonho.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 7: Empada -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
        <img src="../Padaria/imagem/empada.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Empada</h5>
          <h5 class="preco">R$ 3,50</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="7">
            <input type="hidden" name="produto_nome" value="Empada">
            <input type="hidden" name="produto_preco" value="3.50">
            <input type="hidden" name="produto_imagem" value="empada.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 8: Café -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
         <img src="../Padaria/imagem/cafe.avif" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Café</h5>
          <h5 class="preco">R$ 4,50</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="8">
            <input type="hidden" name="produto_nome" value="Café">
            <input type="hidden" name="produto_preco" value="4.50">
            <input type="hidden" name="produto_imagem" value="cafe.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 9: Rosca -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
         <img src="../Padaria/imagem/rosca.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Rosca</h5>
          <h5 class="preco">R$ 8,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="9">
            <input type="hidden" name="produto_nome" value="Rosca">
            <input type="hidden" name="produto_preco" value="8.00">
            <input type="hidden" name="produto_imagem" value="rosca.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Produto 10: Bolinho de Carne -->
    <div class="col-md-3 mb-4">
      <div class="card" style="width: 18rem;">
         <img src="../Padaria/imagem/bolinhocarne.jpg" class="card-img-top" alt="...">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title">Bolinho de Carne</h5>
          <h5 class="preco">R$ 3,00</h5>
          <form method="post" action="adicionar_carrinho.php" class="mt-auto">
            <input type="hidden" name="produto_id" value="10">
            <input type="hidden" name="produto_nome" value="Bolinho de Carne">
            <input type="hidden" name="produto_preco" value="3.00">
            <input type="hidden" name="produto_imagem" value="bolinho-carne.jpg">
            <div class="input-group">
              <input type="number" name="quantidade" class="quantidade-produtos" value="1" min="1">
              <button type="submit" class="comprar">
                <i class="fas fa-cart-plus"></i> COMPRAR
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>

    <footer class="fixarRodape">

    </footer>


</body>
</html>