<?php 
include('conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email'])==0){
        echo "Prenencha seu e-mail";
    } else if (strlen($_POST['senha'])==0) {
        echo "Preencha sua senha";
    } else{
        #CONSULTA SQL
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli ->real_escape_string($_POST['senha']);

        $sql_code= "SELECT * FROM usuarios WHERE email = '$email' AND senha ='$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do SQL:" . $mysqli->error);

        #VERIFICA SE DADOS ESTÃO NO BANCO DE DADOS
        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }else{
            echo "E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Acesse sua conta</h1>
        <input type="text" name="email" id="email" placeholder="Seu e-mail">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" value="Entrar">
        <a href="cadastro.php">Faça seu <strong>CADASTRO!</strong></a>
   
    </form>
</body>
</html>