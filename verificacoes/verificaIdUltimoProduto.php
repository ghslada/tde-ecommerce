<?php
include_once("../conexao.php");
// getProdutos();

function getProdutos(){
        
    $conexao = conectarBD();

    $dados="select * from produto order by id desc limit 1" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res[0]['id']+1);

    }else{
        echo '0 resultados';
    }

    desconectarBD($conexao);

}

?>