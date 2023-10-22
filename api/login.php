<?php
include './bd.php';
require '../vendor/autoload.php';
use Firebase\JWT\JWT;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $database->connect();
    $conn = $database->getConnection();
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password, rol, username FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Redirigir a la página protegida
            $key = 'keo@8nef';
            $payload = array(
                "username" =>  $row["username"],
                "rol" => $row["rol"]
            );

            $token = JWT::encode($payload, $key, 'HS256');
            if ($row["rol"] == 'usuario')
                header("Location: ../pages/catalog.php?token=$token");
            if ($row["rol"] == 'admin')
                header("Location: ../pages/register.php?token=$token");
            if ($row["rol"] == 'cliente')
                header("Location: ../pages/dashboard.php?token=$token");
            exit();
        } else header("Location: ../pages/index.php?alert=credenciales incorrectas");
    } else {
        header("Location: ../pages/index.php?alert=credenciales incorrectas");
        exit();
    }

    $database->closeConnection();
}
?>