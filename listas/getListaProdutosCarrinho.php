<?php
include_once("../conexao.php");
include_once("../avisos/avisoCadastros.php");


function getProdutosCarrinho(){
        
    $conexao = conectarBD();
    
    $dados="select produto.descricao as descricao, produto_pedido.valor as valor, produto_pedido.qtd as qtd, produto.url_img as url_img, produto_pedido.produto_id as id from pedido join produto_pedido on pedido.id=produto_pedido.pedido_id join produto on produto.id=produto_pedido.produto_id where pedido.usuario_cpf='".$_SESSION['cpf']."' and pedido.pedido_status_id=1" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res);

    }else{

        $msg= 'Nenhum produto cadastrado no carrinho';
        getMessegeError($msg);
    }

    desconectarBD($conexao);

}

function getQtdCarrinho(){
        
    $conexao = conectarBD();
    
    $dados="select produto.descricao as descricao, produto_pedido.valor as valor, produto_pedido.qtd as qtd, produto.url_img as url_img, produto_pedido.produto_id as id from pedido join produto_pedido on pedido.id=produto_pedido.pedido_id join produto on produto.id=produto_pedido.produto_id where pedido.usuario_cpf='".$_SESSION['cpf']."' and pedido.pedido_status_id=1" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $nmr_linhas= mysqli_num_rows($result);

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if($nmr_linhas>0){

        echo ($nmr_linhas);

    }else{
        echo '0';
    }

    desconectarBD($conexao);

}

?>