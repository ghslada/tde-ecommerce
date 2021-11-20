<?php 

include_once("../cadastros/cadastrosTipoProduto.php");
verificarCamposCadastroTipoProduto();

function verificarCamposCadastroTipoProduto(){

    if(isset($_POST["submit"])){

        $descricao=$_POST["descricao"];

    
        //verificação dentro da função cadastrar
    
        

        cadastroTipoProduto($descricao);
            
    }
}


?>