<?php
include_once("../conexao.php");
include_once("../avisos/avisoUpdateUser.php");
session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    // $cpf= filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    // $nome= filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_NUMBER_INT);
    // $senha= filter_input(INPUT_GET, 'senha', FILTER_SANITIZE_NUMBER_INT);
    // $endereco= filter_input(INPUT_GET, 'endereco', FILTER_SANITIZE_NUMBER_INT);
    // $cidade_cep= filter_input(INPUT_GET, 'cidade_cep', FILTER_SANITIZE_NUMBER_INT);
    // $tipo_usuario_id= filter_input(INPUT_GET, 'tipo_usuario_id', FILTER_SANITIZE_NUMBER_INT);
    // $telefone= filter_input(INPUT_GET, 'telefone', FILTER_SANITIZE_NUMBER_INT);    
    // updateCliente($cpf);
   
    //NECESSARIO REALIZAR UPDATE E INFORMAR SE TEVE SUCESSO
}
else {
    header("Location: ../login.php");
}

function updateUsuario($cpf, $nome, $email, $senha, $endereco, $cep, $tipo, $telefone){
    
    $conexao = conectarBD();

    $dados="update usuario set nome='{$nome}', senha='{$senha}', endereco='{$endereco}', cidade_cep='{$cep}', tipo_usuario_id={$tipo}, telefone='{$telefone}'  where cpf='{$cpf}'" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    avisoUpdateUser($result);


    desconectarBD($conexao);
}

?>