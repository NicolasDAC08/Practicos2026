<?php
class Conexion{
    private static $servidor = "localhost";
    private static $usuario = "root";
    private static $passwd = "";
    private static $db = "si_inventario";
    private static $conexion = null;

    public static function conexion(){
        if (self::$conexion === null) {
            self::$conexion = new mysqli(self::$servidor, self::$usuario, self::$passwd, self::$db);
            self::$conexion->set_charset("utf8mb4");
        }
        return self::$conexion;
    }
}