<?php

class sessao {
    public static function iniciar() {
        session_start();
    }

    public static function set($chave, $valor) {
        $_SESSION[$chave] = $valor;
    }

    public static function get($chave) {
        return $_SESSION[$chave] ?? null;
    }

    public static function destruir() {
        session_destroy();
    }
}