<?php

// Incluir la conexión a la base de datos
include("conexion.php");

// Leer los datos enviados en formato JSON
$datos = json_decode(file_get_contents("php://input"), true);

// Obtener los datos
$paciente = $datos["paciente"];
$medico = $datos["medico"];
$fecha = $datos["fecha"];
$hora = $datos["hora"];

// Insertar la cita
$sql = "INSERT INTO citas (paciente, medico, fecha, hora)
VALUES ('$paciente', '$medico', '$fecha', '$hora')";

// Verificar si se registró correctamente
if ($conn->query($sql) === TRUE) {

    echo json_encode([
        "mensaje" => "Cita registrada correctamente"
    ]);

} else {

    echo json_encode([
        "mensaje" => "Error al registrar la cita"
    ]);

}

// Cerrar conexión
$conn->close();

?>