<?php
	include 'C:\xampp\htdocs\LINA\Controller\ProduitC.php';
	$ProduitC=new ProduitC();

if (isset($_GET["id"])){
	$ProduitC->supprimerproduit($_GET["id"]);
	header('Location:afficherproduit.php');
}

?>