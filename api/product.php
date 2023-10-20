<?php
include './bd.php';
$database->connect();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $conn = $database->getConnection();
    $q = $_GET["q"];

    $sql = "SELECT * FROM productos WHERE code = '$q'";
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patchData = file_get_contents("php://input");
    $jsonData = json_decode($patchData, true);

    if (isset($jsonData['code'], $jsonData['name'])) {
        $code = $jsonData['code'];
        $name = $jsonData['name'];
        $description = $jsonData['description'];
        $price = $jsonData['price'];
        $stock = $jsonData['stock'];
        $category = $jsonData['category'];

        $conn = $database->getConnection();

        // Utiliza una consulta preparada para evitar la inyección SQL
        $stmt = $conn->prepare("INSERT INTO `productos`(`code`, `nombre`, `descripcion`, `precio`, `stock`, `categoria`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssiii", $code, $name, $description, $price, $stock, $category);   

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