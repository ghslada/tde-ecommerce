<?php
include_once("../updates/updateUsuario.php");
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    $cpf= filter_input(INPUT_GET, 'cpf');
    $nome= filter_input(INPUT_GET, 'nome');
    $email= filter_input(INPUT_GET, 'email');
    $senha= filter_input(INPUT_GET, 'senha');
    $endereco= filter_input(INPUT_GET, 'endereco');
    $cidade_cep= filter_input(INPUT_GET, 'cep');
    $tipo_usuario_id= filter_input(INPUT_GET, 'tipo');
    $telefone= filter_input(INPUT_GET, 'telefone');    
    if(isset($cpf)){
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
                            <form method='post'>
                                <?php
                                
                                if(isset($_POST['submit'])){
                                        updateUsuario($_POST['cpf'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['endereco'],$_POST['cep'],$_POST['tipo'],$_POST['telefone']);
                                }
                                echo('
                               <div class="form-floating mb-3">
                                    <input class="form-control" name="cpf" id="inputCPF" type="text" value="'.$cpf.'" readonly/>
                                    <label for="inputCPF" >CPF: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="nome" id="inputNome" type="text" value="'.$nome.'" />
                                    <label for="inputNome">NOME: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" id="inputEmail" type="text" value="'.$email.'" />
                                    <label for="inputEmail">E-MAIL: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="senha" id="inputSenha" type="text" value="'.$senha.'" />
                                    <label for="inputSenha">SENHA: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="endereco" id="inputEndereco" type="text" value="'.$endereco.'" />
                                    <label for="inputEndereco">ENDEREÇO: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="cep" id="inputCep" type="text" value="'.$cidade_cep.'" />
                                    <label for="inputCep">CEP: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="tipo" id="inputTipoUser" type="text" value="'.$tipo_usuario_id.'" />
                                    <label for="inputTipoUser">Função: </label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="telefone" id="inputTelefone" type="text" value="'.$telefone.'" />
                                    <label for="inputTelefone">TELEFONE: </label>
                                </div>
                                <div class="mt-4 mb-0">
                                    <button type="submit" name="submit" class="d-grid"><p class="btn btn-primary btn-block">Create Account</p></button>
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

