<?php
include './bd.php';
$database->connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = $database->getConnection();

    $sql = "SELECT * FROM categoria";
    $resultado = $conn->query($sql);

    // Paso 3: Recopilar los datos en un arreglo
    $data = array();
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $data[] = $fila;
        }
    }

    // Paso 4: Convertir a JSON
    $json_data = json_encode($data);

    // Paso 5: Enviar la respuesta JSON al cliente
    header('Content-Type: application/json');
    echo $json_data;
}

$database->closeConnection();