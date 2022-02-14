<?php 
include_once("../conexao.php");

$id = filter_input(INPUT_GET, "id");

function getProduto($id){

  $conexao = conectarBD();

  $dados = "select * from produto where id = " . $id;

  $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

  $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

  if(count($res)){

      return ($res);
      
  }else{
      return '0 resultados';
  }

  desconectarBD($conexao);

}

?>