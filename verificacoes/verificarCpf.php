<?php

//VERIFICA SE O EMAIL JA ESTA CADASTRADO NO BANCO DE DADOS
function verificarCpf($cpf, $conexao){

    $busca="SELECT cpf FROM usuario WHERE cpf='{$cpf}';" ;

    $resultado=mysqli_query($conexao, $busca) or die (mysqli_error());

    $nmr_linhas= mysqli_num_rows($resultado);

    echo("<script>console.log('{$nmr_linhas}')</script>");

    if($nmr_linhas>0){

        return true;


    }else{

        return false;
    }
    
//SENDO UTILIZADO NA PAGINA DE CADASTRO DE CLIENTE.
}

?>