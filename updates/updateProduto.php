<?php
include_once("../conexao.php");
// include_once("../avisos/avisoUpdateProduto.php");
include_once("../verificacoes/verificaIdUltimoProduto.php");

session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 2) {
    // $cpf= filter_input(INPUT_GET, 'cpf', FILTER_SANITIZE_NUMBER_INT);
    // $nome= filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_NUMBER_INT);
    // $senha= filter_input(INPUT_GET, 'senha', FILTER_SANITIZE_NUMBER_INT);
    // $endereco= filter_input(INPUT_GET, 'endereco', FILTER_SANITIZE_NUMBER_INT);
    // $cidade_cep= filter_input(INPUT_GET, 'cidade_cep', FILTER_SANITIZE_NUMBER_INT);
    // $tipo_usuario_id= filter_input(INPUT_GET, 'tipo_usuario_id', FILTER_SANITIZE_NUMBER_INT);
    // $telefone= filter_input(INPUT_GET, 'telefone', FILTER_SANITIZE_NUMBER_INT);    
    // updateCliente($cpf);
   
    //NECESSARIO REALIZAR UPDATE E INFORMAR SE TEVE SUCESSO
}
else {
    header("Location: ../login.php");
}

function updateProduto($id, $descricao, $preco, $qtd_estoque, $url_img, $tipo_produto_id, $url_nova){
    if(isset($url_nova)){
        $excluida=unlink($url_img);
        if($excluida==false){
            echo 'Erro ao excluir imagem do sistema.';
        }else{
            $url_img=uploadNoSistema($url_nova);
            echo 'Sucesso ao excluir imagem do sistema.';
        }
    }else{
        
    }
    $conexao = conectarBD();
    $dados="update produto set descricao='{$descricao}', preco='{$preco}', qtd_estoque='{$qtd_estoque}', url_img='{$url_img}', tipo_produto_id={$tipo_produto_id}  where id='{$id}'" ;
    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    if($result){
        echo('Sucesso!!!');
    }
    // avisoUpdateProduto($result);
    desconectarBD($conexao);  
}

function updateProdutoSemNovaImagem($id, $descricao, $preco, $qtd_estoque, $url_img, $tipo_produto_id){
    $conexao = conectarBD();
    $dados="update produto set descricao='{$descricao}', preco='{$preco}', qtd_estoque='{$qtd_estoque}', url_img='{$url_img}', tipo_produto_id={$tipo_produto_id}  where id='{$id}'" ;
    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    if($result){
        echo('Sucesso!!!');
    }
    // avisoUpdateProduto($result);
    desconectarBD($conexao);  
}


function uploadNoSistema($imagem){

    if(isset($imagem)){
    $ext = strtolower(substr($imagem['name'],-4)); //Pegando extensão do arquivo
    $new_name = getProdutos(); //Definindo um novo nome para o arquivo
    $new_name--;
    $dir = '../assets/img/'; //Diretório para uploads
    $enviado=move_uploaded_file($imagem['tmp_name'], $dir.$new_name.$ext); //Fazer upload do arquivo
    if($enviado){
        return "{$dir}{$new_name}{$ext}";
    }else{
        return 'Erro no upload da imagem';
    }
 }

}
?>