<?php
include_once("../conexao.php");

function getListaAdmin(){
    
    $conexao = conectarBD();

    $dados="select * from usuario where tipo_usuario_id=2" ;

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