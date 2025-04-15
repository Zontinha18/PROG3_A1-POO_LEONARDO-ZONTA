<?php
require_once 'classes/sessao.php';
require_once 'classes/autenticador.php';

sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = strip_tags(trim(filter_input(INPUT_POST, 'senha')));
    $lembrar = isset($_POST['lembrar']);

    $usuario = autenticador::login($email, $senha);

    if ($usuario) {
        sessao::set('usuario', $usuario->getNome());
        if ($lembrar) {
            setcookie('email', $email, time() + (86400 * 30), "/"); // 30 dias
        }
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
    <form method="POST">
    <input type="email" name="email" placeholder="E-mail" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <label>
            <input type="checkbox" name="lembrar"> Lembrar e-mail
        </label>
        <button type="submit">Login</button>
    </form>
    <p><a href="cadastro.php">Cadastrar-se</a></p>
</body>
</html>