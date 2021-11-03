<?php
//VERIFICACAO APOS LOGIN PARA REDIRECIONAR PARA SUA RESPECTIVA TELA
//SENDO UTILIZADA PELA FUNCAO DE VERIFICAR LOGIN.
function verificarTipoDeUser($tipo){
    echo("<script>console.log('{$tipo}')</script>");
    if($tipo==2){
            //REDIRECIONA PARA DASHBOARD DE ADMIN
        exit(header("Location:../admin/dashboard.php")); /* Redirect browser */
    }else if($tipo==1){
        //REDIRECIONA PARA A HOME DO CLIENTE
        exit(header("Location:../cliente/home.php")); /* Redirect browser */
    }else{
        //TIPO DE USER NAO EXISTENTE
        exit(header("Location:../404.html"));
    }
}
// FUNCAO SENDO USADA NA PAGINA DE LOGIN, VERIFICA SE USER JA POSSUI UMA SESSAO ATIVA
function verificarSeLogado($tipo){
    if(isset($tipo)){
        if($tipo==2){
            exit(header("Location:./admin/dashboard.php"));
        }elseif($tipo==1){
            exit(header("Location:./cliente/home.php"));
        }else{
            exit(header("Location:./404.html"));
        }
    }
}
?>