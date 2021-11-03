<?php

include_once("./conexao.php");
include_once("./verificacoes/verificarEmail.php");


function cadastrarCliente($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=1,*/ $telefone){
    
    $conexao = conectarBD();

    //verifica se o email ja esta no banco de dados
    $verifica=verificarEmail($email, $conexao);

    if($verifica==true){

        echo('<div class="container border border-dark rounded col-md-5" style="width: 400px; height: 300px; transform: translate(200%, 80%); position: absolute; z-index: 10">
        <div class="row">
            <div class="btn-lg btn-warning rounded-0" style="height: 15%;">
                <div class="btn bg-light mx-1" style="width: 80%; ">Aviso</div>
                <a href="cadastro.php" class="btn btn-danger mx-1" style="float: right;">X</a>
            </div>
        </div>
        <div class="row mt-auto" style="height: 80%">
            <div class="btn bg-white rounded-0 p-3" style="height: 100%">
                <h2 class="mt-5" style="font-size: 200%">Email já cadastrado.</h2>
            </div>
        </div>
    </div>');

    }else{

        $dados="INSERT INTO usuario(cpf, nome, email, senha, endereco, cidade_cep, tipo_usuario_id, telefone) VALUES('{$cpf}', '{$nome}', '{$email}', '{$senha}', '{$endereco}', '{$cidade_cep}', 1, '{$telefone}');";

        mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

        echo('<div class="container border border-dark rounded col-md-5" style="width: 400px; height: 300px; transform: translate(200%, 80%); position: fixed; z-index: 10">
        <div class="row">
            <div class="btn-lg btn-warning rounded-0" style="height: 15%;">
                <div class="btn bg-light mx-1" style="width: 80%; ">Aviso</div>
                <a href="login.php" class="btn btn-danger mx-1" style="float: right;">X</a>
            </div>
        </div>
        <div class="row mt-auto" style="height: 80%">
            <div class="btn bg-white rounded-0 p-3" style="height: 100%">
                <h2 class="mt-5" style="font-size: 200%">Sucesso ao realizar cadastro.</h2>
            </div>
        </div>
    </div>');

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
