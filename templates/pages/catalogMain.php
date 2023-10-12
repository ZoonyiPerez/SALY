<?php $this->layout('catalog', ['title' => 'CATALOG']) ?>
<?php $this->start('styles') ?>
<link rel="stylesheet" href="../public/assest/css/catalogStyles.css">
<?php $this->stop() ?>

<div id="card-container">
</div>

<?php $this->start('scripts') ?>
    <script src="../public/assest/js/routeUser.js"></script>
    <script async src="../public/assest/js/createProductCart.js"></script>
    <script async src="../public/assest/js/addProductCart.js"></script>
<?php $this->stop() ?>