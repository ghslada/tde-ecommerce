<?php 
include_once("../conexao.php");


function getProdutoDoCarrinho($id){

  $conexao = conectarBD();

  $dados = "select * from produto_pedido join pedido on pedido.id=produto_pedido.pedido_id where pedido.usuario_cpf='".$_SESSION['cpf']."' and produto_pedido.produto_id=".$id."";

  $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

  $nmr_linhas= mysqli_num_rows($result);

  $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

  desconectarBD($conexao);

  if($nmr_linhas>0){

      return 1;
      
  }else{
      return 0;
  }


}

?>