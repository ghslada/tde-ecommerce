<?php
include_once("../updates/updateProduto.php");
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    $id= filter_input(INPUT_GET, 'id');
    $descricao= filter_input(INPUT_GET, 'descricao');
    $preco= filter_input(INPUT_GET, 'preco');
    $qtd_estoque= filter_input(INPUT_GET, 'qtd_estoque');
    $url_img= filter_input(INPUT_GET, 'url_img');
    $tipo_produto_id= filter_input(INPUT_GET, 'tipo_produto_id'); 
    if(isset($id)){
        include_once('./header.php');
        gerarHeader();

    }else{
        die('Erro ao exibir formulario, nao foi informado um CPF.');
    }
}
else {
    header("Location: ../login.php");
}
?>

            <!-- INICIO DO CONTEUDO DO CENTRO -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Alterar dados de um usuário</h1>
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
                            <!-- FORMULARIO SENDO ENVIADO PARA A PROPRIA PAGINA -->
                            <form method='post' enctype="multipart/form-data">
                                <?php
                                
                                if(isset($_POST['submit'])){
                                    if(isset($_FILES['img_nova'])){
                                        updateProduto($_POST['id'], $_POST['descricao'], $_POST['preco'], $_POST['qtd_estoque'], $_POST['img_antiga'],$_POST['tipo_produto_id'], $_FILES['img_nova']);
                                    }else{
                                        updateProdutoSemNovaImagem($_POST['id'], $_POST['descricao'], $_POST['preco'], $_POST['qtd_estoque'], $_POST['img_antiga'],$_POST['tipo_produto_id']);
                                    }
                                }
                                echo('
                               <div class="form-floating mb-3">
                                    <input class="form-control" name="id" id="inputCPF" type="text" value="'.$id.'" readonly/>
                                    <label for="inputCPF" >ID: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="descricao" id="inputNome" type="text" value="'.$descricao.'" />
                                    <label for="inputNome">Descrição: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="preco" id="inputEmail" type="text" value="'.$preco.'" />
                                    <label for="inputEmail">Preço: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="qtd_estoque" id="inputSenha" type="text" value="'.$qtd_estoque.'" />
                                    <label for="inputSenha">Quantidade em estoque: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <td> <br> <br> <input style="display: none" alt="Imagem do produto" name="img_antiga" value="'.$url_img.'"></td>
                                    <input  type="file" accept="image/*" class="form-control" name="img_nova"/>
                                    <label for="inputEndereco">Imagem: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="tipo_produto_id" id="inputCep" type="text" value="'.$tipo_produto_id.'" />
                                    <label for="inputCep">Tipo de produto: </label>
                                </div>
                                <div class="mt-4 mb-0">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block d-grid"><p>Update produto.</p></button>
                                </div>
                                ');
                                ?>
                            </form>
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

