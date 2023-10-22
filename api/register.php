<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './bd.php';
    $database->connect();
    $conn = $database->getConnection();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rol = '';
    if($_POST["rol"]) $rol = $_POST["rol"];
    // Verificar si el nombre de usuario ya existe
    $checkUsernameQuery = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        echo "El nombre de usuario ya está registrado. Por favor, elige otro.";
    } else {
        // Hash de contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        if($_POST["rol"]) {
            $insertQuery = "INSERT INTO users (username, password, rol) VALUES ('$username', '$hashedPassword', '$rol')";
        }
        // Insertar nuevo usuario en la base de datos
        if ($conn->query($insertQuery) === TRUE) {
            header("Location: ../pages/index.php?alert=Usuario Registrado");
        } else {
            header("Location: ../pages/index.php?alert=Error al registrar usuario");
        }
    }
}