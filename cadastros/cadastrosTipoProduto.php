<?php 
include_once("../conexao.php");


function cadastroTipoProduto($descricao){

    $conexao = conectarBD();

    $dados="INSERT INTO tipo_produto(descricao) VALUES('{$descricao}')" ;

    mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    echo("Sucesso ao cadastrar tipo de produto.");

    desconectarBD($conexao);
}

?>