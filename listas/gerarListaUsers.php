<?php
include_once("getListaUsers.php");
include_once("../delete/deletarUsuario.php");

$email= filter_input(INPUT_GET, 'email');
if(isset($email)){
    //NECESSARIO REALIZAR UPDATE E INFORMAR SE TEVE SUCESSO
    deletarUsuario($email);
}
function gerarListaUsers(){
    $result=getListaUsers();
    if(isset($result)){
        foreach($result as $res){
            if($res['tipo_usuario_id']==1){
                // $res['tipo_usuario_id']="Cliente";
            }else if($res['tipo_usuario_id']==2){
                // $res['tipo_usuario_id']="Administrador";
            }else{
                $res['tipo_usuario_id']="ERRO.";
            }
            //LISTA SENDO GERADA NA PAGINA ALTERAR CADASTRO
            echo("
                <form method=post action='../updates/updateUsuario.php'>
                    <tr>
                        <td>{$res['cpf']}</td>
                        <td>{$res['nome']}</td>
                        <td>{$res['email']}</td>
                        <td>{$res['senha']}</td>
                        <td>{$res['endereco']}</td>
                        <td>{$res['cidade_cep']}</td>
                        <td>{$res['tipo_usuario_id']}</td>
                        <td>{$res['telefone']}</td>
                        <td><a href='./formAlterarUsuario.php?cpf={$res['cpf']}&nome={$res['nome']}&email={$res['email']}&senha={$res['senha']}&endereco={$res['endereco']}&cep={$res['cidade_cep']}&tipo={$res['tipo_usuario_id']}&telefone={$res['telefone']}' class='btn btn-warning' type=submit name='alterar'><i class='bi bi-pencil-square'></i></a></td>
                        <td>
                            <a class='btn btn-danger' href='./alterarUsuario.php?&email={$res['email']}' ><i class='bi bi-person-x'></i></a>
                        </td>
                    </tr>
                </form>"); 
        }
    }
}

?>

<!-- <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr> -->