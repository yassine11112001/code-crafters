<?php
session_start();

if(isset($_GET["idproduit"])) {
    unset($_SESSION["panier"][array_search($_GET["idproduit"],$_SESSION["panier"])]);
}

	header('Location: validerpanier.php');

    
