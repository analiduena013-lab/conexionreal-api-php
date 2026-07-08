<?php

// Conexión a la base de datos
include("conexion.php");

// Verificar que se envió el ID
if (!isset($_GET['id'])) {
    echo json_encode(["mensaje" => "Debe enviar el ID de la cita"]);
    exit;
}

$id = $_GET['id'];

// Buscar la cita
$sql = "SELECT * FROM citas WHERE id = $id";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {

    $cita = $resultado->fetch_assoc();

    echo json_encode($cita);

} else {

    echo json_encode([
        "mensaje" => "Cita no encontrada"
    ]);

}

$conn->close();

?>