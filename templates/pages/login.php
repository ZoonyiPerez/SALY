<?php $this->layout('layout', ['title' => 'LOGIN']) ?>
<?php $this->start('styles') ?>
<link rel="stylesheet" href="../public/assest/css/loginStyles.css">
<?php $this->stop() ?>
<div class="container">
<div class="filter"></div>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form class="login-form" method="post" action="../api/login.php">
            <label for="username">Usuario:</label>
            <input type="text" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <input type="submit" value="INICIAR SESIÓN">
            <a href="register.php">REGISTRAR</a>
        </form>
    </div>
<div class="logo">
    <img src="../public/assest/img/yanbal.png" alt="" srcset="">
</div>
</div>

<script>
    let params = new URLSearchParams(location.search);
    let alert1 = params.get('alert');
    if(alert1) alert(alert1);
</script>