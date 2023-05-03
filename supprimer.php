<?php
include '../controller/produitC.php';

$produitsC = new produitsC();
$produitsC->supprimerProduit($_GET["id"]);

header('Location: affichageClient.php');

?>