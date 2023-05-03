<?php
include '../controller/produitC.php';
include '../controller/categorieC.php';
include '../vendor/autoload.php';

use Twilio\Rest\Client;

$produitC=new produitsC();
$categoriesC=new categoriesC();
$sid = "AC6ceeac3cd669c6a286925f40b327713a";
    $token = "917061dcc1480a90f0f2f9de01d4b0ef";
    $twilio = new Client($sid, $token);
    
if( isset($_POST['prix'])&&isset($_POST['nom'])&&isset($_POST['description'])&&isset($_POST['id_cat']) )
{      
    $produits = new produits($_POST['prix'],$_POST['nom'],$_POST['description'],$_POST['id_cat']);
    $produitC->ajouterProduit($produits);
    

    $nom = $_POST['nom'];
    $prix = $_POST['description'];
    $id = $_POST['id_cat'];

    $message = $twilio->messages
                  ->create("+21658633371", // to
                           [
                               "body" => "Vous Avez ajouter un produit : Nom : $nom | Prix : $prix | ID Catégorie : $id ",
                               "from" => "+15856324660"
                           ]
                  );

    print($message->sid);

    header('Location: affichageClient.php');
} 
if( isset($_POST['nom_cat']))
{      
    $categories = new categories($_POST['nom_cat']);
    $categoriesC->ajouterCat($categories);

    $nom = $_POST['nom_cat'];

    $message = $twilio->messages
                  ->create("+21658633371", // to
                           [
                               "body" => "Vous Avez ajouter une catégorie : Nom : $nom  ",
                               "from" => "+15856324660"
                           ]
                  );

    print($message->sid);

    header('Location: affichageClient.php');
} 
else
{
echo 'Erreur';
}

?>