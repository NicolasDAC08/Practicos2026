<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_AUTENTICADOR;
require_once RUTA_USUARIO;

$auth = new Autenticacion();

Autenticacion::exigirSesion();

$usuario = new Usuario();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cerrar_sesion'])) {
        $auth->cerrarsesion();
        header("Location: " . RUTA_VISTA . "/login.php");
        exit();
    }
}
