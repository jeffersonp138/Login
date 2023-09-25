<?php 
    # DADOS PARA CONEXÃO COMO SERVIDOR
    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host ='localhost';

    #CONEXÃO
    $mysqli = new mysqli($host, $usuario, $senha, $database);
    
    #VERIFICAR CONEXÃO
    if ($mysqli -> error) {
        die("Falha de conexão ao banco de dados" . $myqsli->error);
    
    }

?>