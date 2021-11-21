<?php
include_once('getListaProdutos.php');

function gerarListaProdutos(){
    $result=getProdutos();
    if(isset($result)){
        foreach($result as $res){
            echo("<tr>
                    <td>{$res['id']}</td>
                    <td>{$res['descricao']}</td>
                    <td>{$res['preco']}</td>
                    <td>{$res['qtd_estoque']}</td>
                    <td><img src='{$res['url_img']}' style='width:100px; height:100px' alt='Imagem do produto' value='{$res['url_img']}'></td>
                    <td>{$res['tipo_produto_id']}</td>
                    <td><a href='./formAlterarProduto.php?id={$res['id']}&descricao={$res['descricao']}&preco={$res['preco']}&qtd_estoque={$res['qtd_estoque']}&url_img={$res['url_img']}&tipo_produto_id={$res['tipo_produto_id']}' class='btn btn-warning' type=submit name='alterar'><i class='bi bi-pencil-square'></i></a></td>


                </tr>");
            
        }
    }
}

?>