<?php

    function conectarBD(){
        $servername="localhost";
        $database="mydb";
        $username="convidado";
        $password="12345";
        $conn = mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("Conexão falhou! ".mysqli_connect_error());
        }else{
            return ($conn);
        }
        
    }

    function desconectarBD($conn){
        mysqli_close($conn);
    }

?>