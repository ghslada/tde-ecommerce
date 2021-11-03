<?php
include_once("getListaUsers.php");


function gerarListaUsers(){
    $result=getListaUsers();
    if(isset($result)){
        foreach($result as $res){
            if($res['tipo_usuario_id']==1){
                $res['tipo_usuario_id']="Cliente";
            }else if($res['tipo_usuario_id']==2){
                $res['tipo_usuario_id']="Administrador";
            }else{
                $res['tipo_usuario_id']="ERRO.";
            }
            echo("<tr>
                    <td>{$res['cpf']}</td>
                    <td>{$res['nome']}</td>
                    <td>{$res['email']}</td>
                    <td>{$res['senha']}</td>
                    <td>{$res['endereco']}</td>
                    <td>{$res['cidade_cep']}</td>
                    <td>{$res['tipo_usuario_id']}</td>
                    <td>{$res['telefone']}</td>
                </tr>");
            
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