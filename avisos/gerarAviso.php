<?php
function gerarAviso($message, $cor){
    if(isset($message)){
        echo('<div style="background-color: '.$cor.'">
                    <p>'.$message.'</p>
            </div>
                ');
    }
}
?>