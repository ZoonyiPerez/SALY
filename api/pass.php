<?php
$contrasena = 'contra';

// Generar el hash de la contraseña
$hash = password_hash($contrasena, PASSWORD_DEFAULT);

echo 'Contraseña: ' . $contrasena . '<br>';
echo 'Hash de contraseña: ' . $hash;
?>