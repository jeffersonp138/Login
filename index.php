<?php
include('conexao.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string(trim($_POST['email']));
    $senha = $mysqli->real_escape_string(trim($_POST['senha']));

    if (strlen($email) == 0) {
        echo 'Preencha seu e-mail';
    } else if (strlen($senha) == 0) {
        echo 'Preencha sua senha';
    } else {
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: painel.php");
            exit();
        } else {
            echo 'E-mail ou senha incorretos';
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
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <h1>Acesse sua conta</h1>
        <input type="text" name="email" id="email" placeholder="Seu e-mail">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="submit" value="Entrar">
        <a href="cadastro.php">Faça seu <strong>CADASTRO!</strong></a>
    </form>
</body>
</html>
