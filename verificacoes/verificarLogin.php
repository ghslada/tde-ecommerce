<?php

include_once("../conexao.php");
include_once("verificarTipoDeUser.php");


//VERIFICA SE FOI ENVIADO ALGUM DADO NO FORMULARIO
if(isset($_POST["login"])){
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    verificarLogin($email, $senha);    
}


//VERIFICA SE O USER E SENHA CONDIZEM COM O BANCO DE DE DADOS, APOS ISSO CHAMA A FUNCAO 
//RESPONSAVEL POR REDIRECIONAR PARA CADA PAGINA CONFORME O TIPO DE USUARIO
function verificarLogin($email, $senha){

    $conexao = conectarBD();

    $busca="SELECT nome, cpf, email, senha, tipo_usuario_id AS tipo FROM usuario WHERE email='{$email}' AND senha='{$senha}';" ;

    $resultado=mysqli_query($conexao, $busca) or die (mysqli_error($conexao));

    $res=mysqli_fetch_array($resultado);
    
    if(isset($res)){
        $tipo=$res['tipo'];
        $nome=$res['nome'];
        $email=$res['email'];
        $cpf=$res['cpf'];
    
        if( $res['email'] == $email && $res['senha'] == $senha ){
            session_start();
            
            $_SESSION["tipo"]=$tipo;
            $_SESSION["nome"]=$nome;
            $_SESSION["cpf"]=$cpf;
            $_SESSION["login"]=1;
            //REDIRECIONA PARA A PAGINA CONFORME TIPO DE USUARIO
            //ARQUIVO verificarTipoDeUser.php
            verificarTipoDeUser($tipo);

        }
    }else{
        session_start();
        $_SESSION['login']=0;
        header("Location:../login.php");
    }

    desconectarBD($conexao);
}

?>