<?php
session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    include_once('./header.php');
    gerarHeader();
}
else {
    header("Location: ../login.php");
}
?>

            <!-- INICIO DO CONTEUDO DO CENTRO -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Usuários</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1 fs-5"></i>
                                <h3>Tabela de clientes</h3>
                                
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple2">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Preço</th>
                                            <th>Quantidade em estoque: </th>
                                            <th>Imagem</th>
                                            <th>Tipo de produto</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Preço</th>
                                            <th>Quantidade em estoque: </th>
                                            <th>Imagem</th>
                                            <th>Tipo de produto</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include_once("../listas/gerarListaProduto.php");
                                        gerarListaProdutos();
                                        ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
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

