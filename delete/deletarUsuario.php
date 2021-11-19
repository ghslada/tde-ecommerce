<?php
include_once("../conexao.php");
include_once("../avisos/avisoDeleteUser.php");
// session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    // $cpf= filter_input(INPUT_GET, 'cpf');
    // $nome= filter_input(INPUT_GET, 'nome');
    // $email= filter_input(INPUT_GET, 'email');
    // $senha= filter_input(INPUT_GET, 'senha');
    // $endereco= filter_input(INPUT_GET, 'endereco');
    // $cidade_cep= filter_input(INPUT_GET, 'cep');
    // $tipo_usuario_id= filter_input(INPUT_GET, 'tipo');
    // $telefone= filter_input(INPUT_GET, 'telefone');    
   
    //NECESSARIO REALIZAR UPDATE E INFORMAR SE TEVE SUCESSO
    // deletarUsuario($email);
}
else {
    header("Location: ../login.php");
}

function deletarUsuario($email){
    
    $conexao = conectarBD();

    $dados="delete from usuario where email='{$email}'";

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    avisoDeleteUsuario($result);


    desconectarBD($conexao);
}

?>