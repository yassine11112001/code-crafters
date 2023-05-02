<?php
	include '../Controller/reservationC.php';
	$reservationC=new reservationC();
	$reservationC->supprimerreservation($_GET["id"]);
	header('Location:afficherreservation.php');
?>