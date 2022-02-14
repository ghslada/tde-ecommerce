<?php
include_once("getListaCidade.php");


function gerarListaCidades(){
    $result = getListaCidades();
    if(isset($result)){
        foreach($result as $res){
            echo("  
                <tr>
                    <td>{$res['cep']}</td>
                    <td>{$res['cidade']}</td>
                    <td>{$res['uf']}</td>
                </tr>");
            
        }
    }
}

?>
