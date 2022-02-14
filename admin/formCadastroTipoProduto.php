<?php
session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    include_once('./header.php');
    include_once("../verificacoes/verificarTipoProduto.php");
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
                            <h1 class="mt-4">Cadastro de Tipo de Produto</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Cadastros</li>
                            </ol>
                        <form action="../verificacoes/verificarTipoProduto.php" method="POST">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="descricao" id="inputDescricao" type="text" />
                                <label for="inputEndereco">Descrição do tipo de Produto</label>
                            </div>      
                            <div class=" mb-0">
                                    <button type="submit" class="btn btn-primary btn-block d-grid" name="submit"><p >Cadastrar tipo de produto.</p></button>
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

