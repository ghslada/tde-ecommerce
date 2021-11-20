<?php

include_once("../conexao.php");

function atribuirAdmin($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=2, */ $telefone){

    $conexao = conectarBD();

    $dados="ALTER " ;

    mysqli_query($conexao, $dados) or die (mysqli_error());

    echo("Sucesso ao cadastrar administrador.");

    desconectarBD($conexao);
}


function cadastrarTipoProduto($descricao){

    $conexao = conectarBD();

    $dados="INSERT INTO tipo_produto(descricao) VALUES({$descricao})" ;

    mysqli_query($conexao, $dados) or die (mysqli_error());

    echo("Sucesso ao cadastrar tipo de produto.");

    desconectarBD($conexao);
}

?>