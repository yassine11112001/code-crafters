<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
ob_start();
 include_once '../../Controller/clientC.php';
 
 $co = new clientC();
 if(isset($_GET['id'])){
   $clientC = new clientC();
   $listeC = $clientC->afficherClientDetail($_GET['id']);
 
 foreach($listeC as $client){
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
                    <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                            </div>
   <form action="#" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="container">
            <h2>Modifier client</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="container">
            <form method="post" onsubmit="return validateForm();">
            <p> 
                <label>Nom </label>
                <input class="form-control" type="text" name="nom" placeholder="Nom" onkeyup="validateNom(this)" value=<?php echo $client['nom'];?> />
                <span id="nomError" class="error-message"></span>
                <span id="nomTick" class="tick"></span>
              </p>
              <p> </form>
<!-- Numtel -->
<div class="form-group">
    <label for="numtel">Numéro de téléphone</label>
    <div class="form-control form-control-user">
        <span><?php echo $client['numtel']; ?></span>
        <input type="hidden" name="numtel" value="<?php echo $client['numtel']; ?>" />
    </div>
</div>

<!-- Email -->
<div class="form-group">
    <label for="email">Adresse email</label>
    <div class="form-control form-control-user">
        <span><?php echo $client['email']; ?></span>
        <input type="hidden" name="email" value="<?php echo $client['email']; ?>" />
    </div>
</div>
              <p> 
                <label>Adresse </label>
                <input type="text" class="form-control form-control-user" name="adresse" value=<?php echo $client['adresse'];?> />
              </p>
              <p> 
                <label>Mot de passe </label>
                <input type="text" class="form-control form-control-user" name="mdp" value=<?php echo $client['mdp'];}?> />
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
 <style>
    .error-message {
        color: red;
    }

    .tick:before {
        content: "✔";
        color: green;
        float: right;
        position: relative;
        top: -28px;
        right: -28px
    }

    .cross:before {
        content: "✘";
        color: red;
        float: right;
        position: relative;
        top: -28px;
        right: -28px
    }
</style>

<script>
      function validateForm() {
        var valid = true;
    function validateNom(nomInput) {
        var nom = nomInput.value;
        var regex_nom = /^[a-zA-Z]{4,15}(\s[a-zA-Z]{4,15})?$/;
        if (!regex_nom.test(nom)) {
            document.getElementById("nomError").innerHTML = "Le nom ne doit pas être vide.";
            document.getElementById("nomTick").classList.remove("tick");
            document.getElementById("nomTick").classList.add("cross");
            valid = false;
        } else {
            document.getElementById("nomError").innerHTML = "";
            document.getElementById("nomTick").classList.remove("cross");
            document.getElementById("nomTick").classList.add("tick");
        }
    }
    return valid;
  }
    function validateNom(input) {
    var nom = input.value;
        var regex_nom = /^[a-zA-Z]{4,15}(\s[a-zA-Z]{4,15})?$/;
        if (!regex_nom.test(nom)) {
        input.setCustomValidity("Le nom doit contenir uniquement des lettres et un seul espace pour séparer le nom et le prénom, et ne doit pas dépasser 15 caractères ni être moin de 4 caractères.");
        document.getElementById("nomTick").classList.remove("tick");
        document.getElementById("nomTick").classList.add("cross");
    } else {
        input.setCustomValidity("");
        document.getElementById("nomTick").classList.remove("cross");
        document.getElementById("nomTick").classList.add("tick");
    }
}
</script>
 <?php
 // create event
 $client = null;

 // create an instance of the controller
 $clientC = new clientC();
 if (
     isset($_POST["nom"]) && 
     isset($_POST["numtel"]) && 
     isset($_POST["email"]) &&
     isset($_POST["adresse"]) && 
     isset($_POST["mdp"])
 ) {
     if (
         !empty($_POST["nom"]) && 
         !empty($_POST["numtel"]) && 
         !empty($_POST["email"]) &&
         !empty($_POST["adresse"]) &&
         !empty($_POST["mdp"]) 
     ) {
         $client = new client(
             $_POST['nom'],
             $_POST['email'],
             $_POST['numtel'],
             $_POST['adresse'],
             $_POST['mdp']
         );
        $clientC->modifierClient($_GET['id'],$client);
         
         header('Location:affichageClient.php');
     }
     else
         $error = "Missing information";
 }

 
}
ob_flush();
?>