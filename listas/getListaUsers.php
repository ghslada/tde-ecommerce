<?php
include_once("../conexao.php");

function getListaUsers(){
    
    $conexao = conectarBD();

    $dados="select * from usuario order by tipo_usuario_id desc" ;

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