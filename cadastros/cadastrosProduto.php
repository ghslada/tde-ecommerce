<?php

include_once("../conexao.php");
// include_once("./verificacoes/verificarEmail.php");
include_once("../avisos/avisoCadastroProduto.php");
include_once("../verificacoes/verificaIdUltimoProduto.php");

// session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
}
else {
    header("Location: ../login.php");
}
function cadastrarProduto($descricao, $preco, $qtd_estoque, $imagem, $tipo_produto_id){

    //UPLOAD DA IMAGEM NO BANCO DE DADOS.
    $url_img=uploadNoSistema($imagem);

    $conexao = conectarBD();

    $dados="INSERT INTO produto(descricao, preco, qtd_estoque, url_img, tipo_produto_id) VALUES('{$descricao}', {$preco}, {$qtd_estoque}, '{$url_img}', {$tipo_produto_id});";
    
    //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
    mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
        
    $mensagem="Sucesso ao cadastrar produto.";
    gerarAvisoCadastroProduto($mensagem);

        
    desconectarBD($conexao);
}

function uploadNoSistema($imagem){

    if(isset($imagem)){
    $ext = strtolower(substr($imagem['name'],-4)); //Pegando extensão do arquivo
    $new_name = getProdutos(); //Definindo um novo nome para o arquivo
    if(strlen($new_name)==0){
        $new_name=1;
    }
        $dir = '../assets/img/'; //Diretório para uploads
    $enviado=move_uploaded_file($imagem['tmp_name'], $dir.$new_name.$ext); //Fazer upload do arquivo
    if($enviado){
        return "{$dir}{$new_name}{$ext}";
    }else{
        echo 'Erro no upload da imagem';
    }
 }

}



?>
