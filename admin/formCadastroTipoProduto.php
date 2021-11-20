<?php
session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    
}
else {
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" >Start Bootstrap</a>

            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>

            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white"><i class="fas fa-user fa-fw"></i> <?php echo($_SESSION['nome']); ?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item bg-danger" href="../logout.php">Logout</a></li>
                        <li><hr class="dropdown-divider" /></li>
                    </ul>
                </li>
            </ul>

        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                <!-- INICIO DO CONTEUDO DA BARRA LATERAL -->

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">


                        <div class="nav">

                            <!-- TAB PARA O DASHBOARD -->

                            <div class="sb-sidenav-menu-heading">Core</div>

                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i style="color: white" class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <!-- FIM DA TAB DASHBOARD-->

                            <!-- TAB PARA AS INTERFACES -->

                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProdutos" aria-expanded="false" aria-controls="collapseProdutos">
                                <div class="sb-nav-link-icon fs-5"><i style="color: white" class="bi bi-shop"></i></div>
                                Produtos
                                <div class="sb-sidenav-collapse-arrow"><i  class="fas fa-angle-down"></i></div>
                            </a>
                                
                                <div class="collapse" id="collapseProdutos" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#produtosCollapseEdit" aria-expanded="false" aria-controls="produtosCollapseEdit">
                                            Gerenciar
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="produtosCollapseEdit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="layout-static.html">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-list-ul"></i></div>
                                                    Tipo de produto
                                                </a>
                                                <a class="nav-link" href="layout-static.html">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-list-ul"></i></div>
                                                    Produtos
                                                </a>
                                                
                                            </nav>
                                        </div>

                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#produtosCollapseEdit2" aria-expanded="false" aria-controls="produtosCollapseEdit2">
                                            Cadastrar novo
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="produtosCollapseEdit2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">

                                                <a class="nav-link" href="layout-static.html">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-bookmark-plus"></i></div>
                                                    Tipo de produto
                                                </a>

                                                <a class="nav-link" href="../cadastro.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white" class="nav-link bi bi-plus-circle-dotted"></i></div>
                                                    Produto
                                                </a>
                                            </nav>
                                        </div>

                                        

                                        


                                    </nav>
                                </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                                <div class="sb-nav-link-icon fs-4"><i style="color: white" class="bi bi-person"></i></div>
                                Usuários
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                <div class="collapse" id="collapseUsuarios" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#usuariosCollapseEdit" aria-expanded="false" aria-controls="usuariosCollapseEdit">
                                            Gerenciar usuários
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="usuariosCollapseEdit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="atribuirAdmin.php">Atribuir função de administrador</a>
                                                <a class="nav-link" href="revogarAdmin.php">Revogar função de administrador</a>
                                                <a class="nav-link" href="alterarUsuario.php">Alterar dados de um usuário</a>
                                            </nav>
                                        </div>

                                        <a class="nav-link" href="../cadastro.php">
                                            <div class="sb-nav-link-icon fs-4"><i style="color: white" class="bi bi-person-plus"></i></div>
                                            Registrar novo usuário
                                        </a>


                                    </nav>
                                </div>
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVendas" aria-expanded="false" aria-controls="collapseVendas">
                                <div class="sb-nav-link-icon fs-4"><i style="color: white" class="bi bi-currency-dollar"></i></div>
                                Vendas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                <div class="collapse" id="collapseVendas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="layout-static.html">Visualizar vendas</a>
                                        <a class="nav-link" href="layout-sidenav-light.html">Detalhes</a>
                                    </nav>
                                </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLocalidades" aria-expanded="false" aria-controls="collapseLocalidades">
                                <div class="sb-nav-link-icon fs-5"><i style="color: white" class="bi bi-geo-alt-fill"></i></div>
                                Localidades
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                <div class="collapse" id="collapseLocalidades" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="../cadastro.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white" class="nav-link bi bi-plus"></i></div>
                                                    Cadastrar cidade
                                                </a>
                                    </nav>
                                </div>
                                
                                <div class="collapse" id="collapseLocalidades" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../cadastro.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white" class="nav-link bi bi-plus"></i></div>
                                                    Cadastrar estado
                                                </a>
                                    </nav>
                                </div>

                            <!-- PAGINAS SEM INTERACAO -->

                            <div class="sb-sidenav-menu-heading">Addons</div>

                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>

                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>                        
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: <p style="color: white"><?php echo($_SESSION["nome"]) ?></p></div>
                        
                    </div>
                </nav>

                <!-- FIM DA BARRA LATERAL ESQUERDA -->

            </div>

            <!-- FIM DA SIDEBAR -->

            <!-- INICIO DO CONTEUDO DO CENTRO -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">                     
                            <h1 class="mt-4">Cadastro de Tipo de Produto</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Cadastros</li>
                            </ol>
                        <form action="../verificacoes/verificarTipoProduto.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="descricao" id="inputDescricao" type="text" />
                                <label for="inputEndereco">Descrição Tipo do Produto</label>
                            </div>      
                            <div class="mt-4 mb-0">
                                <button type="submit" name="submit" class="d-grid"><p class="btn btn-primary btn-block">Cadastrar</p></button>
                            </div>      
                        </form>
                    </div>
                </main>


                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
