<?php
require_once 'classes/sessao.php';

sessao::iniciar();
sessao::destruir();
setcookie('email', '', time() - 3600, "/"); // Remove o cookie
header('Location: login.php');
exit;