<?php
require_once 'classes/usuario.php';
require_once 'classes/autenticador.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim(strip_tags(filter_input(INPUT_POST, 'nome')));
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = trim(strip_tags(filter_input(INPUT_POST, 'senha')));

    $usuario = new usuario($nome, $email, $senha);
    autenticador::registrar($usuario);

    header('Location: login.php');
    exit;
}

