<?php $this->layout('catalog', ['title' => 'CATALOG']) ?>
<?php $this->start('styles') ?>
<link rel="stylesheet" href="../public/assest/css/catalogStyles.css">
<?php $this->stop() ?>

<div id="card-container">
</div>

<?php $this->start('scripts') ?>
    <script async src="../public/assest/js/createProductCart.js"></script>
<?php $this->stop() ?>