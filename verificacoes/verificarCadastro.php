<?php

include_once("./cadastros/cadastrosCliente.php");

function verificarCamposCadastro(){
    if(isset($_POST["submit"])){

        $cpf=$_POST["cpf"];
        $nome=$_POST["nome"];
        $email=$_POST["email"];
        $senha=$_POST["senha"];
        $endereco=$_POST["endereco"];
        $cidade_cep=$_POST["cep"];
        $telefone=$_POST["telefone"];
    
        //verificação dentro da função cadastrar
    
        cadastrarCliente($cpf, $nome, $email, $senha, $endereco, $cidade_cep, /* tipo_usuario_id=2 */ $telefone);
            
    }
}

?>