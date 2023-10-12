<?php
include './bd.php';
$database->connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = $database->getConnection();
    $q = $_GET["q"];

    $sql = "SELECT * FROM productos WHERE categoria = $q";
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

if ($_SERVER["REQUEST_METHOD"] == "PATCH") {
    $patchData = file_get_contents("php://input");
    $jsonData = json_decode($patchData, true);
    
    if (isset($jsonData['code'], $jsonData['value'])) {
        $code = $jsonData['code'];
        $stock = $jsonData['value'];

        $conn = $database->getConnection();
        
        // Utiliza una consulta preparada para evitar la inyección SQL
        $stmt = $conn->prepare("UPDATE `productos` SET stock = ? WHERE code = ?");
        $stmt->bind_param("ii", $stock, $code);

        if ($stmt->execute()) {
            $data = array('message' => 'Actualización exitosa');
        } else {
            $data = array('message' => 'Error en la actualización');
        }
        
        $stmt->close();
    } else {
        $data = array('message' => 'Parámetros incorrectos');
    }

    $json_data = json_encode($data);
    echo $json_data;
}


$database->closeConnection();