<?php
class producto {
    private mysqli $conn;
    public function __construct() {
        $this->conn = Conexion::conexion();
    }

    public function buscarPorId($id) {
        $sql = "SELECT id, nombre, precio, stock FROM productos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc();

        if ($fila) {
            return $fila;
        }
        return array();
    }

    public function listarprodutos() {
        $sql = "SELECT * FROM productos";
        $resultado = $this->conn->query($sql);
        $productos = array();

        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
        return $productos;
    }

        public function ingresar($nombre, $precio, $stock)
    {
        $sql = "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdi", $nombre, $precio, $stock);
        return $stmt->execute();
    }

    public function actualizar($id, $nombre, $precio, $stock)
    {
        $sql = "UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdii", $nombre, $precio, $stock, $id);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}