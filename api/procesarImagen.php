<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
    $nombreArchivo = $_FILES["archivo"]["name"];
    $archivoTemp = $_FILES["archivo"]["tmp_name"];
    $destino = "../public/products" . $nombreArchivo;

    if (move_uploaded_file($archivoTemp, $destino)) {
        echo $nombreArchivo;
    } else {
        echo "Error al cargar la imagen.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}
?>
