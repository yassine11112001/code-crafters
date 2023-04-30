<?php
session_start();

if(isset($_GET["idproduit"])) {
    $_SESSION["panier"][] = $_GET["idproduit"];
}

	header('Location: afficherproduit.php');

    
