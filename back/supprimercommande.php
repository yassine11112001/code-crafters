<?php
	include 'C:\xampp\htdocs\LINA\Controller\CommandeC.php';
	$CommandeC=new CommandeC();

if (isset($_GET["id"])){
	$CommandeC->supprimercommande($_GET["id"]);
	header('Location:affichercommande.php');
}

?>