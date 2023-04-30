<?php
	include 'C:\xampp\htdocs\LINA\Controller\LivraisionC.php';
	$LivraisionC=new LivraisonC();

if (isset($_GET["id"])){
	$LivraisionC->supprimerlivraison($_GET["id"]);
	header('Location:afficherlivraison.php');
}

?>