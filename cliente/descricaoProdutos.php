<?php
    session_start();
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
        echo("Bem vindo, {$_SESSION['nome']}!");
        include_once("../listas/getProdutos.php");
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
        <title>Shop Item - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="./home.php">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="./home.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./home.php">Todos os Produtos</a></li>
                                <li><hr class="dropdown-divider" /></li>
                            <?php
                            $tipos = getListaTipoProduto();
                            foreach($tipos as $tipo){ ?>    
                                <li><a class="dropdown-item" href="<?php echo"produtosTipo.php?id=". $tipo['id']?>"><?php echo $tipo['descricao'] ?></a></li>
                            <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="carrinho.php">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill"><?php getQtdCarrinho() ?></span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
            <?php
            $produtos = getProduto($id);
            if(isset($produtos)){
                foreach($produtos as $produto){ ?>
                <div class="row gx-4 gx-lg-5 align-items-center">                   
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo $produto['url_img'] ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"> Código produto: <?php echo $produto['id'] ?></div>
                        <h1 class="display-5 fw-bolder"><?php echo $produto['descricao'] ?></h1>
                        <div class="fs-5 mb-5">
                            <span>R$ <?php echo $produto['preco']  ?></span>
                        </div>
                        <div class="d-flex">
                            <form class="d-flex" action="../cadastros/cadastrosCarrinho.php" method="POST">
                                <input type="text" style="display: none;" name="id" value="<?php echo $produto['id'] ?>"/>
                                <input type="text" style="display: none;" name="preco" value="<?php echo $produto['preco'] ?>"/>
                                <input class="form-control text-center me-3" name="qtd" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                                <input type="text" style="display: none;" name="descricao" value="<?php echo $produto['descricao'] ?>"/>
                                
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add ao carrinho
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } } ?>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>