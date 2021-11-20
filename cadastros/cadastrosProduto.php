<?php

include_once("../conexao.php");
// include_once("./verificacoes/verificarEmail.php");
include_once("../avisos/avisoCadastroProduto.php");


function cadastrarProduto($descricao, $preco, $qtd_estoque, $url_img, $tipo_produto_id){

    //SERIA BOM IMPLEMENTAR CONTAGEM DE CARACTERES DA SENHA
    $conexao = conectarBD();

    $dados="INSERT INTO produto(descricao, preco, qtd_estoque, url_img, tipo_produto_id) VALUES('{$descricao}', {$preco}, {$qtd_estoque}, '{$url_img}', {$tipo_produto_id});";
    
    //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
    mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
        
    $mensagem="Sucesso ao cadastrar produto.";

    gerarAvisoCadastroProduto($mensagem);
        
    desconectarBD($conexao);
}



?>
