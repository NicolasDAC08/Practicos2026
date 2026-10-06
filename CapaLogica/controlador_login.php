<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_AUTENTICADOR;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: " . RUTA_VISTA . "/login.php");
    exit();
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($username === '' || $password === '') {
    header("Location: " . RUTA_VISTA . "/login.php?error=campos");
    exit();
}

$auth = new Autenticacion();

if ($auth->iniciarsesion($username, $password)) {
    header("Location: " . RUTA_VISTA . "/dashboard.php");
    exit();
}

header("Location: " . RUTA_VISTA . "/login.php?error=credenciales");
exit();