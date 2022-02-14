<?php
include_once("./conexao.php");

function getListaCep(){
    
    $conexao = conectarBD();

    $dados="select * from cidade" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res);

    }else{
        return '0 resultados';
    }

    desconectarBD($conexao);
}

?>