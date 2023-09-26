<?php 
include('conexao.php');

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email'])==0){
        echo "Prenencha seu e-mail";
    } 
    else if (strlen($_POST['senha'])==0) {
        echo "Preencha sua senha";
    
    } 
    else if(strlen($_POST['nome']== 0)){
        echo imap_alerts("Preencha seu nome");

    }
    else{
        #CONSULTA SQL
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli ->real_escape_string($_POST['senha']);

        $sql_insert= "INSERT INTO  usuarios (nome, email, senha) VALUES ('$nome','$email','$senha')";
        $sql_query = $mysqli->query($sql_insert) or die("Falha ao cadastrar:" . $mysqli->error);

        #VERIFICA SE DADOS ESTÃO NO BANCO DE DADOS

        
    }     
}

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="" method="post" id="cadastro">
        <h1>Cadastre-se no nosso site</h1>
        <input type="text" name="nome" placeholder="Seu nome completo">
        <input type="text" name="email" id="email" placeholder="Seu e-mail">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="password" name="senha" id="senha" placeholder="Confirmar senha">
        <input type="submit" value="Cadastre-se!">
        <a href="index.php"><strong>VOLTAR!</strong></a>
   
    </form>
</body>
</html>
