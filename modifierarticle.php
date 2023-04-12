<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../../controller/articleC.php';
 
 $co = new articleC();
 if(isset($_GET['num'])){
   $articleC = new articleC();
   $listeC = $articleC->afficherarticleDetail($_GET['num']);
 
 foreach($listeC as $article){
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                            </div>
   <form action="#" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="container">
            <h2>Modifier article</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="container">
              <p> 
                <label>Nom </label>
                <input type="text" class="form-control form-control-user" name="nom" value=<?php echo $article['nom'];?> />
              </p>
              <p> 
                <label>Numtel </label>
                <input type="number" class="form-control form-control-user" name="numtel" value=<?php echo $article['numtel'];?> />
              </p>


              <p> 
                <label>texte </label>
                <input type="texte" class="form-control form-control-user" name="texte" value=<?php echo $article['texte'];?> />
              </p>
              <p> 
                <label>Adresse </label>
                <input type="text" class="form-control form-control-user" name="adresse" value=<?php echo $article['adresse'];?> />
              </p>
              <p> 
                <label>Mot de passe </label>
                <input type="text" class="form-control form-control-user" name="mdp" value=<?php echo $article['mdp'];}?> />
              </p>

             

             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 </body>
 <?php
 // create event
 $article = null;

 // create an instance of the controller
echo('dd');
 $articleC = new articleC();
 if (
     isset($_POST["num"]) && 
      isset($_POST["num"]) && 
     isset($_POST[""])
 ) {
     if (
         !empty($_POST["nom"]) && 
         !empty($_POST["numtel"]) && 
         !empty($_POST["texte"]) &&
         !empty($_POST["adresse"]) &&
         !empty($_POST["mdp"]) 
     ) {
         $article = new article(
             $_POST['num'],
             $_POST['texte'],
             $_POST['nom'],

         );
        $articleC->modifierarticle($_GET['id'],$article);
         
         header('Location:affichagearticle.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>