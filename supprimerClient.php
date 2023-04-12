<?php
 include_once '../../Controller/clientC.php';
 $co = new clientC();
 if(isset($_GET['id'])){
     $co->supprimerClient($_GET['id']);
 
    header('Location:affichageClient.php');
    }

 ?>