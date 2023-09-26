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
	<?= $this->section('content') ?>
	<?= $this->insert('scripts') ?>
</body>

</html>