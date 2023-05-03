<?php
include_once '../../Model/client.php';
include_once '../../Controller/clientC.php';
$clientC = new clientC();
$clientC->setDisconn();
header('Location:../Front/login.php');

?>