<?php
	include '../Controller/evenementC.php';
	$evenementC=new evenementC();
	$evenementC->supprimerevenement($_GET["id"]);
	header('Location:afficherevenement.php');
?>