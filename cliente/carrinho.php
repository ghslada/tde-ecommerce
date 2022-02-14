<?php
    session_start();
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
        echo("Bem vindo, {$_SESSION['nome']}!");
        include_once("../listas/getListaProdutos.php");
        include_once("../listas/getListaTipoProduto.php");
        include_once("../listas/getListaProdutosCarrinho.php");
        
    }
    else {
        header("Location:../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="home.php">Todos Produtos</a></li>
                                <li><hr class="dropdown-divider" /></li>
                            <?php
                            $tipos = getListaTipoProduto();
                            if(isset($tipos)){
                                foreach($tipos as $tipo){ ?>    
                                <li><a class="dropdown-item" href="<?php echo"produtosTipo.php?id=". $tipo['id']?>"><?php echo $tipo['descricao'] ?></a></li>
                            <?php 
                                } 
                            }
                            ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex me-auto" method="POST" action="carrinho.php">
                        <button class="btn-lg btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php getQtdCarrinho() ?></span>
                        </button>
                    </form>
                    <form class="d-flex me-1 ml-1" method="POST" action="perfil.php">
                        <button class="btn-lg btn-secondary" type="submit">
                            <i class="bi bi-person-circle"></i>
                            <span><?php echo($_SESSION['nome']); ?></span> 
                        </button>
                    </form>
                    <form class="d-flex me-1 ml-1" method="POST" action="../logout.php">
                        <button class="btn-lg btn-danger" type="submit">
                            <span>Logout</span> 
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Carrinho de Produtos</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5 d-flex justify-content-around">
          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Produto</th>
                  <th scope="col">Preço</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $produtos = getProdutosCarrinho();
                $total=0;
                if(isset($produtos)){
                    foreach($produtos as $produto) { 
                        $subtotal = $produto['qtd'] * $produto['valor'];   
                ?> 
                
                <tr>
                    <th class="d-flex "><img style="max-width: 90px;" src="<?php echo $produto['url_img'] ?>">
                        <p><?php echo $produto['descricao'] ?></p>
                    </th>
                    <td >R$<?php echo $produto['valor'] ?></td>
                    <td><?php echo $produto['qtd'] ?></td>
                    <td>R$<?php echo $subtotal ?>.00</td>
                    <td><a style="color:red;" href="../delete/deletarProdutoCarrinho.php?id=<?php echo $produto['id'] ?>"><i style="cursor: pointer;" class="bi bi-x-lg"></i></a></td>
                </tr>
                <?php 
                        $total += $subtotal;
                    } 
                } ?>   
              </tbody>
            </table>
          </div>
          <div style="max-height: 300px; margin-left: 50px; padding: 12px">
               <h4 style="margin-bottom: 30px;">informações de valor total</h4>
               <p style="margin-bottom: 30px;">R$<?php  echo $total ?>.00</p>
               <button type="button" class="btn btn-dark">Finalizar Pedido</button>
          </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
