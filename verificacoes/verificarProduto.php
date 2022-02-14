<?php
include_once("../conexao.php");
// getProdutos();

function verificarProduto($id){
        
    $conexao = conectarBD();

    $dados="select id from produto where id=".$id."" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res[0]['id']);

    }else{
        echo '0 resultados';
    }

    desconectarBD($conexao);

}

?>