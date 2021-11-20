<?php
include_once("getListaTipoProduto.php");


function gerarListaTipoProduto(){
    $result=getListaTipoProduto();
    if(isset($result)){
        foreach($result as $res){
            echo("  
                <tr>
                    <td>{$res['id']}</td>
                    <td>{$res['descricao']}</td>
                </tr>");
            
        }
    }
}

?>
