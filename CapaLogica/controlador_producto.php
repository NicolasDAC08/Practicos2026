<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_AUTENTICADOR;
require_once RUTA_GESTOR_PRODUCTOS;

Autenticacion::exigirSesion();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: " . RUTA_VISTA . "/dashboard.php");
    exit();
}

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';
$gestor = new GestorProductos();

if ($accion === 'guardar') {
    $idProducto = null;
    if (isset($_POST['id_producto']) && $_POST['id_producto'] !== '') {
        $idProducto = (int)$_POST['id_producto'];
    }
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $precio = isset($_POST['precio']) ? (float)$_POST['precio'] : 0;
    $stock = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;

    $gestor->guardar($idProducto, $nombre, $precio, $stock);
}

if ($accion === 'eliminar') {
    $idProducto = isset($_POST['id_producto']) ? (int)$_POST['id_producto'] : 0;
    if ($idProducto > 0) {
        $gestor->eliminar($idProducto);
    }
}

header("Location: " . RUTA_VISTA . "/dashboard.php");
exit();