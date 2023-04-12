<?php
 include_once '../../controller/articleC.php';
 $co = new articleC();
 if(isset($_GET['id'])){
     $co->supprimerarticle($_GET['nom']);
 
    header('Location:affichagerarticle.php');
    }

 ?>