<?php
session_start();
include_once('./header.php');
include_once('../cadastros/cadastrosProduto.php');
include_once('../listas/gerarOptionTiposProduto.php');
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
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
                        <h1 class="mt-4">Produtos</h1>
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
                                <h3>Formulário para cadastro de novo produto.</h3>
                                
                            </div>
                            <div class="card-body">

                                <!-- IMPLEMENTAR INPUTS PARA CADASTRO DE PRODUTO.
                                     COM UPLOAD DE IMG NO SISTEMA -->

                            <form method='post' enctype="multipart/form-data">
                                <?php
                                
                                if(isset($_POST['submit'])){
                                    cadastrarProduto($_POST['descricao'], $_POST['preco'], $_POST['qtd_estoque'], $_FILES['imagem'], $_POST['tipo_produto_id']);
                                }
                                echo('
                                
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="descricao" id="inputNome" type="text" value="" />
                                    <label for="inputNome">Descrição: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="preco" id="inputEmail" type="text" value="" />
                                    <label for="inputEmail">Preço: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="qtd_estoque" id="inputSenha" type="text" value="" />
                                    <label for="inputSenha">Quantidade em estoque: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="file" accept="image/*" class="form-control" name="imagem" id="inputEndereco"/>
                                    <label for="inputEndereco">Imagem: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" name="tipo_produto_id" id="inputEndereco" type="text">
                                        ');

                                        //OPTIONS DEVEM SER INFORMADOS ANTES DE FECHAR O SELECT. 
                                        gerarOptionTipoProduto();

                                echo('
                                    </select>
                                    <label for="inputEndereco">Tipo de produto </label>
                                </div>
                                <div class=" mb-0">
                                <button type="submit" class="btn btn-primary btn-block d-grid" name="submit"><p >Cadastrar produto.</p></button>
                            </div>
                                ');
                                ?>
                            </form>

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

