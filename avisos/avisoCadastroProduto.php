<?php
function gerarAvisoCadastroProduto($message){
    if(isset($message)){
        echo('<div style="background-color: rgba(135,211,124,1)">
                    <p>'.$message.'</p>
            </div>
                ');
    }
}
?>