<?php
session_start();
logout();
//DESTROI A SESSAO E REDIRECIONA PARA LOGIN 
//SENDO USADO NO DASHBOARD DO ADMIN E HOME DO CLIENTE
function logout(){
    if(isset($_SESSION["tipo"]) || isset($_SESSION["nome"]) || isset($_SESSION["login"])){
        session_destroy();
        header("Location:./login.php");
    }else{
        echo("Você não está logado.");
    }
}
?>