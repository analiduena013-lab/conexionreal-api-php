<?php

// Configuración de la conexión a MySQL

$host = "localhost";
$usuario = "root";
$contrasena = "anclalia1524";
$baseDatos = "conexionreal";

// Crear la conexión
$conn = new mysqli($host, $usuario, $contrasena, $baseDatos);

// Verificar si existe un error
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer caracteres UTF-8
$conn->set_charset("utf8");

?>