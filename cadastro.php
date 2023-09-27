<?php 
include('conexao.php');

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha']) || (isset($_POST['senha2']))) {
$nome = $mysqli->real_escape_string($_POST['nome']);
$email = $mysqli->real_escape_string($_POST['email']);
$senha = $mysqli ->real_escape_string($_POST['senha']);
$senha2 = $mysqli ->real_escape_string($_POST['senha2']);


    if(strlen($_POST['nome'])== 0){
        echo alerta("Preencha seu nome");
    }
    else if(strlen($_POST['email'])==0){
        echo alerta("Prenencha seu e-mail");
    } 
   
    else if (strlen($_POST['senha'])==0) {
        echo alerta("Preencha sua senha");
    
    } 
    else if($senha != $senha2) {  
    
        echo alerta("As senhas devem ser iguais");
        
    } 
    
else{

    $sql_insert= "INSERT INTO  usuarios (nome, email, senha) VALUES ('$nome','$email','$senha')";
    $sql_query = $mysqli->query($sql_insert) or die("Falha ao cadastrar:" . $mysqli->error);

    
    echo alerta("Cadastrado com sucesso!");
    
}     
}

function alerta($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
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
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="cadastro">
        <h1>Cadastre-se no nosso site</h1>
        <input type="text" name="nome" placeholder="Seu nome completo">
        <input type="text" name="email" id="email" placeholder="Seu e-mail">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="password" name="senha2" id="senha" placeholder="Confirmar senha">
        <input type="submit" value="Cadastre-se!">
        <a href="index.php"><strong>VOLTAR!</strong></a>
   
    </form>
</body>
</html>