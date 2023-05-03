<?php
include '../controller/categorieC.php';
include '../config.php';

$categoriesC = new categoriesC();
$categoriesC->supprimerCat($_GET["id_cat"]);

header('Location: affichageClient.php');

?>