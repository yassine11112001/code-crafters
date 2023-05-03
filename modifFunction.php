<?php
include '../controller/produitC.php';
include '../controller/categorieC.php';


$id = $_GET["id"];
$produitsC=new produitsC();
$categoriesC=new categoriesC();
if(
    isset($_POST['prix']) &&isset($_POST['nom']) &&isset($_POST['description']) &&isset($_POST['id_cat'])
    
){
    $produits = new produits($_POST['prix'],$_POST['nom'],$_POST['description'],$_POST['id_cat']);
    $produitsC->modifierProduit($id, $produits);
}
if(
    isset($_POST['nom_cat'])
    
){
    $categories = new categories($_POST['nom_cat']);
    $categoriesC->modifierCat($id, $categories);
}
else
echo 'erreur';
header('Location: affichageClient.php');
?>