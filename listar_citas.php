<?php

// Conexión a la base de datos
include("conexion.php");

// Consultar todas las citas
$sql = "SELECT * FROM citas";

$resultado = $conn->query($sql);

$citas = array();

// Recorrer los registros
while ($fila = $resultado->fetch_assoc()) {
    $citas[] = $fila;
}

// Devolver los datos en formato JSON
echo json_encode($citas);

// Cerrar conexión
$conn->close();

?>