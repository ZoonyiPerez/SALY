<?php
include_once '../autoload.php';
$templates = new League\Plates\Engine('../templates');

echo $templates->render('pages/register');