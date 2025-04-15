<?php
require_once 'classes/usuario.php';
require_once 'classes/autenticador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    $novoUsuario = new usuario($nome, $email, $senha);
    autenticador::registrar($novoUsuario);

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
            background-color: #f5f5f5;
        }
        form {
            display: inline-block;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input, button {
            display: block;
            margin: 10px auto;
            padding: 10px;
            width: 250px;
        }
        button {
            background-color:rgb(4, 255, 0);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Crie uma conta</h1>
    <p>É rapido,facil e vai te ajudar a acessar o que precisa :)</p>

    <form method="POST">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <input type="email" name="email" placeholder="Seu e-mail" required>
        <input type="password" name="senha" placeholder="Crie uma senha" required>
        <button type="submit">Cadastrar novo Usuário</button>
    </form>
</body>
</html>
