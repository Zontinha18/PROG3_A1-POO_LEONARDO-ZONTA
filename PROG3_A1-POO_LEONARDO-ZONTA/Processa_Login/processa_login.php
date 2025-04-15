<?php
require_once 'classes/sessao.php';
require_once 'classes/autenticador.php';

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = trim(strip_tags(filter_input(INPUT_POST, 'senha')));
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
        header('Location: login.php?erro=1');
        exit;
    }
}
