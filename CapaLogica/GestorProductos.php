<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_PRODUCTO;

class GestorProductos{
    private $producto;

    public function __construct(){
        $this->producto = new Producto();
    }

    public function listar(){
        return $this->producto->listarprodutos();
    }

    public function buscar($id){
        return $this->producto->buscarPorId($id);
    }

    public function guardar($id, $nombre, $precio, $stock){
        $nombre = trim($nombre);

        if ($nombre === '') {
            return false;
        }
        if ($precio < 0 || $stock < 0) {
            return false;
        }

        if ($id === null) {
            return $this->producto->ingresar($nombre, $precio, $stock);
        }
        return $this->producto->actualizar($id, $nombre, $precio, $stock);
    }

    public function eliminar($id){
        return $this->producto->eliminar($id);
    }
}