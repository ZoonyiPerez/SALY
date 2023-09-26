<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './bd.php';
    $database->connect();
    $conn = $database->getConnection();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Redirigir a la página protegida
            header("Location: ../pages/catalog.php");
            exit();
        }
    } else {
        header("Location: ../pages/index.php?alert=credenciales incorrectas");
        exit();
    }

    $database->closeConnection();
}