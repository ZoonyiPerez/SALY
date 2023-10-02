<?php $this->layout('layout', ['title' => 'REGISTER']) ?>
<?php $this->start('styles') ?>
<link rel="stylesheet" href="../public/assest/css/loginStyles.css">
<?php $this->stop() ?>
<div class="container">
    <div class="filter"></div>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form class="login-form" method="post" action="../api/register.php">
            <label for="username">Usuario:</label>
            <input class="input" type="text" name="username" required>
            <label for="password">Contraseña:</label>
            <input class="input" type="password" name="password" required>
            <label for="password1">Repetir Contraseña:</label>
            <input class="input" type="password" name="password1" required>
            <span class="error hidden"></span>
            <input class="disabled" type="submit" value="REGISTRAR" disabled>
            <a href="index.php">INICIAR SESIÓN</a>
        </form>
    </div>
    <div class="logo">
        <img src="../public/assest/img/yanbal.png" alt="" srcset="">
    </div>
</div>