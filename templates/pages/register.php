<?php $this->layout('layout', ['title' => 'REGISTER']) ?>
<?php $this->start('styles') ?>
<link rel="stylesheet" href="../public/assest/css/loginStyles.css">
<?php $this->stop() ?>
<div class="container">
    <div class="filter"></div>
    <div class="login-container">
        <?php
        if ($_GET['token']) {
            echo '<h2>Registrar usuario</h2>';
            echo '<form class="login-form" method="post" action="../api/register.php">';
            echo '    <label for="username">Usuario:</label>';
            echo '    <input class="input" type="text" name="username" required>';
            echo '    <label for="password">Contraseña:</label>';
            echo '    <input class="input" type="password" name="password" required>';
            echo '    <label for="password1">Repetir Contraseña:</label>';
            echo '    <input class="input" type="password" name="password1" required>';
            echo '    <input class="hidden input" type="text" name="rol" value="cliente">';
            echo '    <span class="error hidden"></span>';
            echo '    <input class="disabled" type="submit" value="REGISTRAR" disabled>';
            echo '    <a href="index.php">INICIAR SESIÓN</a>';
            echo '</form>';
        } else {
            echo '<h2>Registrar cliente</h2>';
            echo '<form class="login-form" method="post" action="../api/register.php">';
            echo '    <label for="username">Usuario:</label>';
            echo '    <input class="input" type="text" name="username" required>';
            echo '    <label for="password">Contraseña:</label>';
            echo '    <input class="input" type="password" name="password" required>';
            echo '    <label for="password1">Repetir Contraseña:</label>';
            echo '    <input class="input" type="password" name="password1" required>';
            echo '    <span class="error hidden"></span>';
            echo '    <input class="disabled" type="submit" value="REGISTRAR" disabled>';
            echo '    <a href="index.php">INICIAR SESIÓN</a>';
            echo '</form>';
        }

        ?>
    </div>
    <div class="logo">
        <img src="../public/assest/img/yanbal.png" alt="" srcset="">
    </div>
</div>