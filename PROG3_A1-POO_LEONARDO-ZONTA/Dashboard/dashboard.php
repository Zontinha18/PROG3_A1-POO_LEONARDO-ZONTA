<?php
require_once 'classes/sessao.php';

Sessao::iniciar();

$usuarioNome = sessao::get('usuario');
$emailCookie = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';

if (!$usuarioNome) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($usuarioNome); ?>!</h1>
    <p>Seu e-mail foi salvo: <?php echo htmlspecialchars($emailCookie); ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>