<?php

include_once("../conexao.php");
include_once("../verificacoes/verificarEmail.php");


function cadastrarCliente($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=1,*/ $telefone){
    
    $conexao = conectarBD();

    //verifica se o email ja esta no banco de dados
    $verifica=verificarEmail($email, $conexao);

    if($verifica==true){

        echo("Email já cadastrado");

    }else{

        $dados="INSERT INTO usuario(cpf, nome, email, senha, endereco, cidade_cep, tipo_usuario_id, telefone) VALUES('{$cpf}', '{$nome}', '{$email}', '{$senha}', '{$endereco}', '{$cidade_cep}', 1, '{$telefone}');";

        mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

        echo("Sucesso ao realizar cadastro.");

    }
    desconectarBD($conexao);
}

function exibirProdutos(){

}

function exibirCarrinho(){

}

function alterarCarrinho(){

}

function excluirCarrinho(){
    
}   




?>
