<?php 

function cadastrarCidade($cep, $nome, $uf){

  $conexao = conectarBD();

  $dados="INSERT INTO cidade(cep, cidade, estado_id) VALUES({$cep}, '{$nome}', {$uf})" ;

  mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

  echo("Sucesso ao cadastrar cidade.");

  desconectarBD($conexao);
}


?>