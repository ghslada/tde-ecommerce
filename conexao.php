<?php

    

        function conectarBD(){
            $tns = " 
            (DESCRIPTION =
                (ADDRESS_LIST =
                (ADDRESS = (PROTOCOL = tcp)(HOST = localhost)(PORT = 1521))
                )
                (CONNECT_DATA =
                (SERVER = DEDICATED)
                (SERVICE_NAME = XE)
                )
            )
                ";
            $conn = new PDO ("oci:dbname=".$tns, 'smith', '12345');
            if (!$conn) {
            $m = oci_error();
            echo $m['message'], "\n";
            echo '<script>console.log("Erro ao conectar ao Oracle!")</script>';
            exit;
            }
            else {
            print "Connected to Oracle!";
            echo '<script>console.log("Conectado ao Oracle!")</script>';
            return $conn;
            }
    
        }        

        function desconectarBD($conn) {
            $conn = null;
        }

    // function conectarBD(){
    //     $conn = oci_connect("SYS", "!Sodelade123", "//localhost/xe", null, OCI_SYSDBA);
    //     if (!$conn) {
    //     $m = oci_error();
    //     echo $m['message'], "\n";
    //     echo '<script>console.log("Erro ao conectar ao Oracle!")</script>';
    //     exit;
    //     }
    //     else {
    //     print "Connected to Oracle!";
    //     echo '<script>console.log("Conectado ao Oracle!")</script>';
    //     }

    // }

    
    // function desconectarBD($conn){
    //         oci_close($conn);
    // }

// Create connection to Oracle

// Close the Oracle connection

?>