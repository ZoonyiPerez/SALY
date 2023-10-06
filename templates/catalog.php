<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Google Meta -->
    <title>PAGINA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assest/css/styles.css">
    <?= $this->section('styles') ?>
</head>

<body>
    <div id="loader" class="loader hidden">
        <div class="lds-facebook">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <nav class="nav">
        <img class="nav-logo" src="../public/assest/img/logo-yanbal.svg" alt="logo yanbal">
        <ul class="nav-contianer">
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=ofertas"><span class="nav-text">Ofertas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=tratamiento-facial"><span class="nav-text">Tratamiento facial</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=cuidado-personal"><span class="nav-text">Cuidado personal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=maquillaje"><span class="nav-text">Maquillaje</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=perfumes"><span class="nav-text">Perfumes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?q=joyeria"><span class="nav-text">Joyería</span></a>
            </li>
            <div class="cart-icon">
                <img id="cart-img" src="../public/assest/img/bolsa.png" alt="" srcset="">
                <div id="cart-container" class="cart-container hidden">
                    <span>Carrito de compras</span>
                    <div class="cart-items">
                    </div>
                    <button class="cart-delete">Vaciar carrito</button>
                </div>
            </div>
        </ul>

    </nav>
    <?= $this->section('content') ?>
    <?= $this->section('scripts') ?>
</body>

</html>