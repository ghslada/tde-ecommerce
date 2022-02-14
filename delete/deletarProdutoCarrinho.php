<?php
include_once("../conexao.php");
include_once("../avisos/avisoDeleteUser.php");
session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {
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
    $id= filter_input(INPUT_GET, 'id');
    deletarProdutoCarrinho($id);

    header("Location: ../cliente/carrinho.php");
}
else {
    header("Location: ../login.php");
}

function deletarProdutoCarrinho($id){
    
    $conexao = conectarBD();

    $dados="delete produto_pedido.* from produto_pedido join pedido on produto_pedido.pedido_id=pedido.id where produto_pedido.produto_id='".$id."' and pedido.usuario_cpf='".$_SESSION['cpf']."'";

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    desconectarBD($conexao);
}

?>