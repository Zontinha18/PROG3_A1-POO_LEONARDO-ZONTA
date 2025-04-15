<?php

class autenticador {
    private static $usuarios = [];

    public static function registrar(usuario $usuario) {
        self::$usuarios[$usuario->getEmail()] = $usuario;
    }

    public static function login($email, $senha) {
        if (isset(self::$usuarios[$email])) {
            $usuario = self::$usuarios[$email];
            if ($usuario->verificarSenha($senha)) {
                return $usuario;
            }
        }
        return null;
    }
}