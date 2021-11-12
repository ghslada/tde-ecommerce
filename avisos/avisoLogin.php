<?php

function avisoTentativaLogin(){
    if(isset($_SESSION['login']) && $_SESSION['login']==0){
        echo('<div class="container border border-dark rounded col-md-5" style="width: 400px; height: 300px; transform: translate(125%, 75%); position: absolute; z-index: 1">
        <div class="row">
            <div class="btn-lg btn-warning rounded-0" style="height: 15%;">
                <div class="btn bg-light mx-1" style="width: 80%; ">Aviso</div>
                <a href="logout.php" class="btn btn-danger mx-1" style="float: right;">X</a>
            </div>
        </div>
        <div class="row mt-auto" style="height: 80%">
            <div class="btn bg-white rounded-0 p-3" style="height: 100%">
                <h2 class="mt-5" style="font-size: 200%">Email ou senha incorretos</h2>
            </div>
        </div>
    </div>');
    }
}

?>