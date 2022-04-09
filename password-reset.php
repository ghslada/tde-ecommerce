<?php
include_once("conexao.php");
include_once("verificacoes/verificarEmail.php");

include_once("avisos/gerarAviso.php");
// include_once("avisos/avisoLogin.php");
// session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset your password</h3></div>
                                    <div class="card-body">

                                        <?php
                                        
                                        include_once("vendor/autoload.php");                     
                                        use Symfony\Component\Mailer\Transport;
                                        use Symfony\Component\Mailer\Mailer;
                                        use Symfony\Component\Mime\Email;
                                        
                                            
                                        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
                                        $dotenv->load();

                                        if($_POST && $_POST["email"]){
                                            $email = $_POST["email"];
                                            $conexao = conectarBD();
                                            $EmailExiste = verificarEmail($email, $conexao);
                                            if($EmailExiste && $EmailExiste===true){
                                                
            
                                                $transport = Transport::fromDsn($_SERVER['MAILER_DSN']);

                                                $mailer = new Mailer($transport);

                                                $e_mail = (new Email())
                                                    ->from('oultimo@moicano.com')
                                                    ->to($email)
                                                    //->cc('cc@example.com')
                                                    //->bcc('bcc@example.com')
                                                    //->replyTo('fabien@example.com')
                                                    //->priority(Email::PRIORITY_HIGH)
                                                    ->subject('Time for Symfony Mailer!')
                                                    ->text('Sending emails is fun again!')
                                                    ->html('<p>See Twig integration for better HTML integration!</p>');

                                                $mailer->send($e_mail);
                                                gerarAviso("Código de redefinição de senha enviado para o e-mail informado.", "green");
                                            }else{
                                                gerarAviso("E-mail não encontrado no banco de dados. Digite um e-mail cadastrado em nosso site", "red");
                                            }
                                            desconectarBD($conexao);
                                        }
                                      
                                        ?>

                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Your e-mail address</label>
                                            </div>
                                            <button type="submit" name="login" class="btn btn-primary" style="float: right" >Reset password</button>
                                            <a  class="btn btn-primary" style="float: left"  href="./login.php">
                                            Back
                                            </a>
                                            </div>
                                        </form>
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
