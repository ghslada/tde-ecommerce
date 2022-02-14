<?php 
include_once("../cadastros/cadastrosTipoProduto.php");

function getMessegeCadastroTipo($messege){
  
  if(empty($query)){
    echo 
    "<p 
    style='
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    width: 100%;
    text-align: center;
    margin-bottom: 0;
    padding: 10px;
    '>
      $messege
    </p>";
  }else{
    echo 
    "<p 
    style='
    background-color: #ff655a;
    color: #000;
    border: 1px solid #c3e6cb;
    width: 100%;
    text-align: center;
    margin-bottom: 0;
    padding: 10px;
    '>
      'Erro ao cadastrar'
    </p>";
  }
  

}

?>