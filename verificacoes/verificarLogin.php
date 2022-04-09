<?php

include_once("../conexao.php");
include_once("verificarTipoDeUser.php");


//VERIFICA SE FOI ENVIADO ALGUM DADO NO FORMULARIO
if(isset($_POST["login"])){
    $email=$_POST["email"];
    $senha=$_POST["senha"];
    verificarLogin($email, $senha);    
}


//VERIFICA SE O USER E SENHA CONDIZEM COM O BANCO DE DE DADOS, APOS ISSO CHAMA A FUNCAO 
//RESPONSAVEL POR REDIRECIONAR PARA CADA PAGINA CONFORME O TIPO DE USUARIO
function verificarLogin($email, $senha){

    $conexao = conectarBD();

    $sql="SELECT nome, cpf, email, senha, tipo_usuario_id AS tipo FROM usuario WHERE email='{$email}' AND senha='{$senha}'" ;

    $result = $conexao->query($sql);

    // $res=mysqli_fetch_array($resultado);
    
    if ($result->num_rows > 0) {
        $tipo=$res['tipo'];
        $nome=$res['nome'];
        $email=$res['email'];
        $cpf=$res['cpf'];
    
        if( $res['email'] == $email && $res['senha'] == $senha ){
            session_start();
            
            $_SESSION["tipo"]=$tipo;
            $_SESSION["nome"]=$nome;
            $_SESSION["cpf"]=$cpf;
            $_SESSION["login"]=1;
            //REDIRECIONA PARA A PAGINA CONFORME TIPO DE USUARIO
            //ARQUIVO verificarTipoDeUser.php
            verificarTipoDeUser($tipo);

        }
    }else{
        session_start();
        $_SESSION['login']=0;
        header("Location:../login.php");
    }

    desconectarBD($conexao);
}

// $sql = "SELECT id, firstname, lastname FROM MyGuests";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

?>