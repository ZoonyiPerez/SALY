<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './bd.php';
    $database->connect();
    $conn = $database->getConnection();
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Verificar si el nombre de usuario ya existe
    $checkUsernameQuery = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo "El nombre de usuario ya está registrado. Por favor, elige otro.";
    } else {
        // Hash de contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertar nuevo usuario en la base de datos
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: ../pages/index.php?alert=Usuario Registrado");
        } else {
            header("Location: ../pages/index.php?alert=Error al registrar usuario");
        }
    }
}