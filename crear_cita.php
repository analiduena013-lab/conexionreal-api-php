<?php

header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Conexión
$host = "localhost";
$usuario = "root";
$contrasena = "anclalia1524";
$baseDatos = "conexionreal";

$conn = new mysqli($host, $usuario, $contrasena, $baseDatos);

if ($conn->connect_error) {
    echo json_encode([
        "mensaje" => "Error de conexión: " . $conn->connect_error
    ]);
    exit();
}

// Leer los datos enviados en formato JSON
$datos = json_decode(file_get_contents("php://input"), true);
if (!$datos) {
    echo json_encode([
        "mensaje" => "No se recibieron datos JSON"
    ]);
    exit();
}

// Obtener los datos
$paciente = $datos["paciente"];
$medico = $datos["medico"];
$fecha = $datos["fecha"];
$hora = $datos["hora"];

// Insertar la cita
$sql = "INSERT INTO cita (paciente, medico, fecha, hora)
VALUES ('$paciente', '$medico', '$fecha', '$hora')";

if ($conn->query($sql) === TRUE) {

    echo json_encode([
        "mensaje" => "Cita registrada correctamente"
    ]);

} else {

    echo json_encode([
        "mensaje" => "Error al registrar la cita"
    ]);
}

$conn->close();
?>