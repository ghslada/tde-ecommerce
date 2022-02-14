<?php
include_once("getListaEstado.php");


function gerarOptionEstado(){
    $result=getListaEstado();
    if(isset($result)){
        // echo('<select class="form-control" name="tipo_produto_id" id="inputEndereco" type="text" value="">');
        foreach($result as $res){
            echo("<option value='{$res['id']}'>{$res['uf']}</option>");
        }
    }
}

?>
