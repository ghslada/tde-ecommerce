<?php
// session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    gerarHeader();
}
else {
    header("Location: ../login.php");
}

function gerarHeader(){
    echo('
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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white"><i class="fas fa-user fa-fw"></i>'.$_SESSION['nome'].'</a>
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
                                                <a class="nav-link" href="./gerenciarTipoProduto.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-list-ul"></i></div>
                                                    Tipo de produto
                                                </a>
                                                <a class="nav-link" href="./gerenciarProduto.php">
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

                                                <a class="nav-link" href="./formCadastroTipoProduto.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-bookmark-plus"></i></div>
                                                    Tipo de produto
                                                </a>

                                                <a class="nav-link" href="./formCadastroProduto.php">
                                                    <div class="sb-nav-link-icon fs-4"><i style="color: white" class="nav-link bi bi-plus-circle-dotted"></i></div>
                                                    Produto
                                                </a>
                                            </nav>
                                        </div>

                                        

                                        


                                    </nav>
                                </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                                <div class="sb-nav-link-icon fs-4"><i style="color: white" class="bi bi-person"></i></div>
                                Usu??rios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                <div class="collapse" id="collapseUsuarios" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#usuariosCollapseEdit" aria-expanded="false" aria-controls="usuariosCollapseEdit">
                                            Gerenciar usu??rios
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>

                                        <div class="collapse" id="usuariosCollapseEdit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="atribuirAdmin.php">Atribuir fun????o de administrador</a>
                                                <a class="nav-link" href="revogarAdmin.php">Revogar fun????o de administrador</a>
                                                <a class="nav-link" href="alterarUsuario.php">Alterar dados de um usu??rio</a>
                                            </nav>
                                        </div>

                                        <a class="nav-link" href="../cadastro.php">
                                            <div class="sb-nav-link-icon fs-4"><i style="color: white" class="bi bi-person-plus"></i></div>
                                            Registrar novo usu??rio
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
                                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#localidadesCollapseEdit" aria-expanded="false" aria-controls="produtosCollapseEdit">
                                            Gerenciar
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                            <div class="collapse" id="localidadesCollapseEdit" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="./gerenciarCidade.php">
                                                        <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-list-ul"></i></div>
                                                        Cidades
                                                    </a>
                                                    <a class="nav-link" href="./gerenciarEstado.php">
                                                        <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-list-ul"></i></div>
                                                        Estados
                                                    </a>                                               
                                                </nav>
                                            </div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#localidadesCollapseEdit2" aria-expanded="false" aria-controls="produtosCollapseEdit2">
                                            Cadastrar novo
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                            <div class="collapse" id="localidadesCollapseEdit2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                                <nav class="sb-sidenav-menu-nested nav">
                                                    <a class="nav-link" href="./formCadastroCidade.php">
                                                        <div class="sb-nav-link-icon fs-4"><i style="color: white"  class="nav-link bi bi-bookmark-plus"></i></div>
                                                        Cidade
                                                    </a>
                                                    <a class="nav-link" href="./formCadastroEstado.php">
                                                        <div class="sb-nav-link-icon fs-4"><i style="color: white" class="nav-link bi bi-plus-circle-dotted"></i></div>
                                                        Estado
                                                    </a>
                                                </nav>
                                            </div>
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
                        <div class="small">Logged in as: <p style="color: white">'.$_SESSION["nome"].'</p></div>
                        
                    </div>
                </nav>

                <!-- FIM DA BARRA LATERAL ESQUERDA -->

            </div>

            <!-- FIM DA SIDEBAR -->
    ');
}
?>