<?php

include_once("../conexao.php");

function atribuirAdmin($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=2, */ $telefone){

    $conexao = conectarBD();

    $dados="ALTER " ;

    mysqli_query($conexao, $dados) or die (mysqli_error());

    echo("Sucesso ao cadastrar administrador.");

    desconectarBD($conexao);
}

function cadastrarProduto($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=2 */ $telefone){

    $conexao = conectarBD();

    $dados="INSERT INTO produto(cpf, nome, email, senha, endereco, cidade_cep, tipo_usuario_id, telefone) VALUES({$cpf}, {$nome}, {$email}, {$senha}, $endereco, $cidade_cep, 2, $telefone)" ;

    mysqli_query($conexao, $dados) or die (mysqli_error());

    echo("Sucesso ao cadastrar produto.");

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