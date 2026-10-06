<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_USUARIO;
class Autenticacion{
    private $usuario;

    public function __construct(){
        $this->usuario = new Usuario();
    }

    public function iniciarsesion($username, $password){
        $usuario = $this->usuario->buscarporusername($username);

        if (empty($usuario)) {
            return false;
        }

        if (!password_verify($password, $usuario['password_hash'])) {
            return false;
        }

        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION['usuario_id'] = (int)$usuario['id'];
        $_SESSION['usuario'] = $usuario['username'];

        return true;
    }

    public function cerrarsesion(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION = array();
        session_destroy();
    }

    public static function verificarsesion(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        return isset($_SESSION['usuario_id']);
    }

    public static function exigirsesion(){
        if (!self::verificarsesion()) {
            header("Location: " . RUTA_VISTA . "/login.php");
            exit();
        }
    }
}