<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_PRODUCTO;

class GestorProductos{
    private $Producto;
    public function __construct(){
        $this->Producto = new Producto();
    }

    public function listar(){
        return $this->Producto->listarprodutos();
    }

    public function buscar($id){
        return $this->Producto->buscarPorId($id);
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
            return $this->Producto->ingresar($nombre, $precio, $stock);
        }
        return $this->Producto->actualizar($id, $nombre, $precio, $stock);
    }

    public function eliminar($id){
        return $this->Producto->eliminar($id);
    }
}