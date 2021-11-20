<?php
include_once("../conexao.php");

function getListaTipoProduto(){
    
    $conexao = conectarBD();

    $dados="select * from tipo_produto" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error());

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res);

    }else{
        return '0 resultados';
    }

    desconectarBD($conexao);
}

?>