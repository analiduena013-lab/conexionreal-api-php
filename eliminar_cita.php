<?php

// Conexión a la base de datos
include("conexion.php");

// Verificar que se recibió el ID
if (!isset($_GET['id'])) {
    echo json_encode([
        "mensaje" => "Debe enviar el ID de la cita"
    ]);
    exit;
}

$id = $_GET['id'];

// Eliminar la cita
$sql = "DELETE FROM cita WHERE id = $id";

// Verificar el resultado
if ($conn->query($sql) === TRUE) {

    echo json_encode([
        "mensaje" => "Cita eliminada correctamente"
    ]);

} else {

    echo json_encode([
        "mensaje" => "Error al eliminar la cita"
    ]);

}

// Cerrar conexión
$conn->close();

?>