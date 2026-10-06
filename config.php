<?php
//profe hice esto pq tenia mil y un errores con los require_once, y no me dejaba hacer nada
define("RUTA_RAIZ", __DIR__);
define("RUTA_MODELO", RUTA_RAIZ . "/CapaModelo");
define("RUTA_LOGICA", RUTA_RAIZ . "/CapaLogica");
define("RUTA_VISTA", RUTA_RAIZ . "/CapaPresentacion");

define("RUTA_CONEXION", RUTA_MODELO . "/Conexion.php");
define("RUTA_USUARIO", RUTA_MODELO . "/Usuario.php");
define("RUTA_PRODUCTO", RUTA_MODELO . "/Producto.php");
define("RUTA_AUTENTICADOR", RUTA_LOGICA . "/Autenticador.php");
define("RUTA_GESTOR_PRODUCTOS", RUTA_LOGICA . "/GestorProductos.php");