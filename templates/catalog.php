<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /><!-- Google Meta -->
    <title>
        <?= $this->e($title) ?>
    </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assest/css/styles.css">
    <?= $this->section('styles') ?>
</head>

<body class='block-scroll'>
    <div class="container-add-product hidden">

        <form action="" class="form-add-product">
            <h2>Crear Producto</h2>
            <label for="code">Codigo:</label>
            <input class="input" id="code" type="text" name="code" required>
            <label for="name">Nombre:</label>
            <input class="input" id="name" type="text" name="name" required>
            <label for="description">Descripcion:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <label for="price">Precio:</label>
            <input class="input" id="price" type="number" name="price" required>
            <label for="stock">Stock:</label>
            <input class="input" id="stock" type="number" name="stock" required>
            <label for="stock">Categoria:</label>
            <select name="category" id="category">

            </select>
            <div class="buttons">
                <input type="submit" id="crear" value="Crear">
                <input type="button" id="salir" value="Salir">
            </div>
        </form>
    </div>
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
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=ofertas"><span
                        class="nav-text">Ofertas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=tratamiento-facial"><span
                        class="nav-text">Tratamiento facial</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=cuidado-personal"><span
                        class="nav-text">Cuidado personal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=maquillaje"><span
                        class="nav-text">Maquillaje</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=perfumes"><span
                        class="nav-text">Perfumes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="catalog.php?token=<?= $_GET["token"] ?>&q=joyeria"><span
                        class="nav-text">Joyería</span></a>
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
            <li>
                <img class="add-icon hidden" src="../public/assest/img/plus.png" alt="">
            </li>
            <li>
                <img class="logout" src="../public/assest/img/logout.png" alt="">
            </li>
        </ul>

    </nav>
    <?= $this->section('content') ?>
    <?= $this->section('scripts') ?>
</body>

</html>