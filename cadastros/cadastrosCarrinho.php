<?php

include_once("../conexao.php");
// include_once("./verificacoes/verificarEmail.php");
include_once("../avisos/avisoCadastroProduto.php");
include_once("../listas/getProdutosCarrinho.php");
// include_once("../verificacoes/verificaIdUltimoProduto.php");

session_start();
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 1) {

    //produto
    $descricao=$_POST['descricao'];
    $preco=$_POST['preco'];
    $id=$_POST['id'];
    $qtd=$_POST['qtd'];
    cadastrarProduto($descricao, $preco, $id, $qtd);
}
else {
    header("Location: ../login.php");
}


function cadastrarProduto($descricao, $preco, $id, $qtd){

    $carrinho=getCarrinho();
    if(isset($carrinho)){
        //... segue o cadastro
        $conexao = conectarBD();
        $verif=getProdutoDoCarrinho($id);
        if($verif>=1){
            echo("Produto já adicionado ao carrinho.");
        }else{
            $conexao = conectarBD();
            $dados="INSERT INTO produto_pedido(produto_id, pedido_id, qtd, valor) VALUES($id, ".$carrinho['id'].", $qtd, $preco)"; 
            //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
            mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
            
            $mensagem="Sucesso ao inserir produto no carrinho.";
            // echo("<script>console.log(".$mensagem.")</script>");
            header('Location: ../cliente/carrinho.php');
            
        }
            
        desconectarBD($conexao);

    }else{
        //INSERT DO PRIMEIRO DO PRODUTO.
        criarCarrinho();
        $carrinho=getCarrinho();
        //... segue o cadastro
            $conexao = conectarBD();
            $dados="INSERT INTO produto_pedido(produto_id, pedido_id, qtd, valor) VALUES($id, ".$carrinho['id'].", $qtd, $preco)"; 
            //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
            mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
            
            $mensagem="Sucesso ao inserir produto no carrinho.";
            // gerarAvisoCadastroProduto($mensagem);
            header('Location: ../cliente/carrinho.php');
 
        desconectarBD($conexao);

    }
};


function criarCarrinho(){

    $conexao = conectarBD();

    $dados="INSERT INTO pedido(data_hora, pedido_status_id, usuario_cpf, custo) VALUES(CURRENT_TIMESTAMP, 1, {$_SESSION['cpf']}, 0);";
    
    //SE USAR OR DIE A PAGINA FICA EM BRANCO EXIBINDO SO A MSG DE ERRO VINDA DA QUERY SQL
    mysqli_query($conexao, $dados) or die(mysqli_error($conexao));
        
    $mensagem="Sucesso ao criar carrinho.";
    gerarAvisoCadastroProduto($mensagem);

        
    desconectarBD($conexao);
}

function getCarrinho(){
    $conexao = conectarBD();

    $dados="select * from pedido join usuario on pedido.usuario_cpf=usuario.cpf where pedido.pedido_status_id=1 and usuario.cpf='{$_SESSION['cpf']}'" ;

    $result=mysqli_query($conexao, $dados) or die (mysqli_error($conexao));

    $res=mysqli_fetch_all($result, MYSQLI_ASSOC);

    if(count($res)){

        return $res[0];

    }else{
        echo '0 resultados';
    }

    desconectarBD($conexao);
}

?>
