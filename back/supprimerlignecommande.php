<?php
	include 'C:\xampp\htdocs\LINA\Controller\ligne_commandeC.php';
	$ligne_commandeC=new ligne_commandeC();

if (isset($_GET["id"])){
	$ligne_commandeC->supprimerligne_commande($_GET["id"],$_GET["idp"]); 
	header('Location:afficherlignecommande.php');
}

?>