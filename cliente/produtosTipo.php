<?php
    session_start();
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
        echo("Bem vindo, {$_SESSION['nome']}!");
        include_once("../listas/getListaTipoProduto.php");
        include_once("../listas/getProdutosPorTipo.php");
        include_once("../listas/getListaProdutosCarrinho.php");
    }
    else {
        header("Location:../login.php");
    }
    
    //CONSULTA POR TIPOS
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon -->
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
                            <?php } } ?>
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
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php 
                $produtos = produtosPorTipo($id);
                if(isset($produtos)){
                    foreach($produtos as $produto){ ?>    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo $produto['url_img'] ?>" alt="<?php echo $produto['descricao']?>" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $produto['descricao'] ?></h5>
                                    <!-- Product price-->
                                    $<?php echo $produto['preco'] ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo"descricaoProdutos.php?id=". $produto['id']?>">Visualizar</a></div>
                            </div>
                        </div>
                    </div>
                <?php 
                    }
                } ?>    
                </div>
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
