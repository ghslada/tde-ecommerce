<?php
include_once("getListaCep.php");


function gerarOptionCep(){
    $result=getListaCep();
    if(isset($result)){
        // echo('<select class="form-control" name="tipo_produto_id" id="inputEndereco" type="text" value="">');
        foreach($result as $res){
            echo("<option value='{$res['cep']}'>{$res['cep']}</option>");
        }
    }
}

?>
