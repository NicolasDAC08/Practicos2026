<?php
require_once __DIR__ . '/../config.php';
require_once RUTA_CONEXION;

class usuario {
    private mysqli $conn;
    public function __construct(){
        $this->conn = Conexion::conexion();
    }
    public function buscarporusername($username)
    {
        $sql = "SELECT id, username, password_hash FROM usuarios WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_array();

        if ($fila) {
            return $fila;
        }
        return array();
    }
}