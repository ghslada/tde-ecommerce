<?php
include_once("../conexao.php");
// getProdutos();

$id = filter_input(INPUT_GET, "id");

function produtosPorTipo($id){
        
    $conexao = conectarBD();
    
    $dados="select * from produto where tipo_produto_id = " . $id;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    $nmr_linhas = mysqli_num_rows($result);

    if(($nmr_linhas)>0){

        return ($res);

    }else{
        echo '0 resultados';
    }

    desconectarBD($conexao);

}

?>