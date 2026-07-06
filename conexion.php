<?php
/* Conexión a MySQL (XAMPP)
   Usuario y clave por defecto de XAMPP: root / (vacío) */

$host    = 'localhost';
$usuario = 'root';
$clave   = '';
$base    = 'mi_mejor_amigo';

$conexion = new mysqli($host, $usuario, $clave, $base);

if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}
$conexion->set_charset('utf8mb4');

/* Devuelve la edad en años a partir de una fecha (YYYY-MM-DD) */
function edad_anios($fecha) {
    $nac = new DateTime($fecha);
    return $nac->diff(new DateTime())->y;
}
