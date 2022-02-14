<?php 
include_once('../conexao.php');

function getListaEstado(){
  $conexao = conectarBD();
    
  $dados="select * from estado";

  $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

  $res=mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  if(count($res)){

      return ($res);

  }else{
    echo '0 resultados';
  }

  desconectarBD($conexao);



}


?>