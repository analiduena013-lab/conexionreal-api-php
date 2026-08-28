<?php

// Conexión a la base de datos
include("conexion.php");

// Leer los datos enviados
$datos = json_decode(file_get_contents("php://input"), true);

// Obtener los valores
$id = $datos["id"];
$paciente = $datos["paciente"];
$medico = $datos["medico"];
$fecha = $datos["fecha"];
$hora = $datos["hora"];

// Actualizar la cita
$sql = "UPDATE cita SET
        paciente='$paciente',
        medico='$medico',
        fecha='$fecha',
        hora='$hora'
        WHERE id=$id";

// Verificar resultado
if ($conn->query($sql) === TRUE) {

    echo json_encode([
        "mensaje" => "Cita actualizada correctamente"
    ]);

} else {

    echo json_encode([
        "mensaje" => "Error al actualizar la cita"
    ]);

}

$conn->close();

?>