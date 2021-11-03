<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="cpf" id="inputCPF" type="text" placeholder="Escreva seu CPF" />
                                                        <label for="inputCPF">CPF</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="nome" id="inputNome" type="text" placeholder="Escreva seu nome completo" />
                                                        <label for="inputNome">Nome completo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="senha" id="inputPassword" type="password" placeholder="Crie a senha" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirme a senha" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="endereco" id="inputEndereco" type="text" placeholder="name@example.com" />
                                                <label for="inputEndereco">Endereço</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="cep" id="inputCEP" type="text" placeholder="96105-103" />
                                                <label for="inputCEP">CEP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="telefone" id="inputTelefone" type="phone" placeholder="54 99239-4812" />
                                                <label for="inputTelefone">Telefone</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button type="submit" name="submit" class="d-grid"><p class="btn btn-primary btn-block">Create Account</p></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php

    include_once("cadastros/cadastrosCliente.php");

    if(isset($_POST["submit"])){

        $cpf=$_POST["cpf"];
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $endereco=$_POST["endereco"];
        $cidade_cep=$_POST["cep"];
        $telefone=$_POST["telefone"];

        //verificação dentro da função cadastrar

        cadastrarCliente($cpf, $nome, $email, $senha, $endereco, $cidade_cep, /* tipo_usuario_id=2 */ $telefone);
            
    }
?>