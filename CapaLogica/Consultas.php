<?php
class Consultas {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function verificarUsuario($username, $password) {
        $stmt = $this->conn->prepare("SELECT id, username, password_hash FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password_hash'])) {
                return true;
            }
        }
        return false;
    }
}
