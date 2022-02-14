<?php
include_once("../conexao.php");

function getListaCidades(){
    
    $conexao = conectarBD();

    $dados="select * from cidade AS C JOIN estado E ON C.estado_id = E.id";

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return ($res);

    }else{
        echo '0 resultados';
    }

    desconectarBD($conexao);
}

?>