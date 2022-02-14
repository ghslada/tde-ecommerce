<?php

include_once("./conexao.php");
include_once("./verificacoes/verificarEmail.php");
include_once("./verificacoes/verificarCpf.php");
include_once("./avisos/avisoCadastro.php");


function cadastrarCliente($cpf, $nome, $email,$senha,$endereco,$cidade_cep, /* tipo_usuario_id=1,*/ $telefone){

    //SERIA BOM IMPLEMENTAR CONTAGEM DE CARACTERES DA SENHA
    $conexao = conectarBD();

    //VERIFICA SE O EMAIL JA ESTA NO BANCO DE DADOS
    $verifica=verificarEmail($email, $conexao);

    if($verifica==true){

        //GERA AVISO EMAIL JA CADASTRADO
        $mensagem="Email já cadastrado.";
        gerarAvisoCadastro($verifica, $mensagem);

    }else{
        $verifica=verificarCpf($cpf, $conexao);
        if($verifica==true){
            //GERA AVISO EMAIL JA CADASTRADO
            $mensagem="CPF já cadastrado.";
            gerarAvisoCadastro($verifica, $mensagem);
    
        }else{
            $dados="INSERT INTO usuario(cpf, nome, email, senha, endereco, cidade_cep, tipo_usuario_id, telefone) VALUES('{$cpf}', '{$nome}', '{$email}', '{$senha}', '{$endereco}', '{$cidade_cep}', 1, '{$telefone}');";
            //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
            mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
            
            //GERA AVISO SUCESOS AO CADASTRAR
            $mensagem="Sucesso ao realizar cadastro.";
            gerarAvisoCadastro($verifica, $mensagem);
        }
        
    }
    desconectarBD($conexao);
}

// function exibirProdutos(){

// }

// function exibirCarrinho(){

// }

// function alterarCarrinho(){

// }

// function excluirCarrinho(){
    
// }   




?>
