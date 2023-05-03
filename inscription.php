<?php
include_once '../../Model/client.php';
include_once '../../Controller/clientC.php';
$clientC = new clientC();

if (isset($_POST['nom']) &&
    isset($_POST['adresse']) &&
    isset($_POST['email']) &&
    isset($_POST['numtel']) &&
    isset($_POST['mdp']) ) { 
    //isset($_POST['role'])) {  // Modification pour vérifier le rôle sélectionné
        if (!empty($_POST['nom']) &&
        !empty($_POST['adresse']) &&
        !empty($_POST['email']) &&
        !empty($_POST['numtel']) &&
        !empty($_POST['mdp'])) {
        // Ajouter la date d'inscription
        $dateInscr = date('Y-m-d H:i:s');
        $config = 'admin';  // Valeur par défaut pour les administrateurs
        if ($_POST['role'] == 'client') {
            $config = 'client';
        }
        $client = new client(
            $_POST['nom'],
            $_POST['email'],
            $_POST['numtel'],
            $_POST['adresse'],
            $_POST['mdp'],
            //$dateInscr,  // ajouter la date d'inscription
            $_POST['role']  // Utiliser la valeur du formulaire pour le rôle
        );
        $clientC->ajouterClient($client);
        header('Location:login.php');
    } else
        $error = "Missing information";
}
?>

 
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/user/view/Front/login.php">
                        <span class="arrow">&#60;</span> <span class="text">Precedent</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="login-dark">
    <form method="post" onsubmit="return validateForm();">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

        <div class="form-group">
            <input class="form-control" type="text" name="nom" placeholder="Nom" onkeyup="validateNom(this)">
            <span id="nomError" class="error-message"></span>
            <span id="nomTick" class="tick"></span>
        </div>
        <div class="form-group">
             <input class="form-control" type="email" name="email" placeholder="Email" onkeyup="validateEmail(this)">
             <span id="emailError" class="error-message"></span>
             <span id="emailTick" class="tick"></span>
        </div>
        <div class="form-group"><input class="form-control" type="text" name="adresse" placeholder="Adresse"></div>
        <div class="form-group">
              <input class="form-control" type="number" name="numtel" placeholder="Numtel" onkeyup="validateNumtel(this)">
              <span id="numtelError" class="error-message"></span>
              <span id="numtelTick" class="tick"></span>
        </div>
        <div class="form-group"><input class="form-control" type="password" name="mdp" placeholder="Password"></div>
        <div class="form-group">
            <select class="form-control" name="role">
                <option value="client" selected>Client</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button></div>
    </form>
</div>

<style>
.error-message {
        color: red;
    }

    .tick:before {
        content: "✔";
        color: green;
        float: right;
        position: relative;
        top: -22px;
        right: -14px
    }

    .cross:before {
        content: "✘";
        color: red;
        float: right;
        position: relative;
        top: -22px;
        right: -14px
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<script>
    function validateForm() {
        var valid = true;
        
        var numtel = document.forms[0]["numtel"].value;
        if (isNaN(numtel) || numtel.length != 8) {
            document.getElementById("numtelError").innerHTML = "Le numéro de téléphone doit être un nombre de 8 chiffres.";
            document.getElementById("numtelTick").classList.remove("tick");
            document.getElementById("numtelTick").classList.add("cross");
            valid = false;
        } else {
            document.getElementById("numtelError").innerHTML = "";
            document.getElementById("numtelTick").classList.remove("cross");
            document.getElementById("numtelTick").classList.add("tick");
        }
        
        var email = document.forms[0]["email"].value;
        var regex = /^\S+@\S+\.\S+$/;
        if (!regex.test(email)) {
            document.getElementById("emailError").innerHTML = "L'adresse email doit être valide.";
            document.getElementById("emailTick").classList.remove("tick");
            document.getElementById("emailTick").classList.add("cross");
        valid = false;
    } else {
        document.getElementById("emailError").innerHTML = "";
        document.getElementById("emailTick").classList.remove("cross");
        document.getElementById("emailTick").classList.add("tick");
    }
    
    var nom = document.forms[0]["nom"].value;
        var regex_nom = /^[a-zA-Z]{1,20}(\s[a-zA-Z]{1,20})?$/;
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
    
    return valid;
}
function validateNom(input) {
    var nom = input.value;
        var regex_nom = /^[a-zA-Z]{1,20}(\s[a-zA-Z]{1,20})?$/;
        if (!regex_nom.test(nom)) {
        input.setCustomValidity("Le nom doit contenir uniquement des lettres et un seul espace pour séparer le nom et le prénom, et ne doit pas dépasser 20 caractères.");
        document.getElementById("nomTick").classList.remove("tick");
        document.getElementById("nomTick").classList.add("cross");
    } else {
        input.setCustomValidity("");
        document.getElementById("nomTick").classList.remove("cross");
        document.getElementById("nomTick").classList.add("tick");
    }
}

function validateEmail(input) {
    var regex = /^\S+@\S+\.\S+$/;
    if (!regex.test(input.value)) {
        input.setCustomValidity("L'adresse email doit être valide.");
        document.getElementById("emailTick").classList.remove("tick");
        document.getElementById("emailTick").classList.add("cross");
    } else {
        input.setCustomValidity("");
        document.getElementById("emailTick").classList.remove("cross");
        document.getElementById("emailTick").classList.add("tick");
    }
}

function validateNumtel(input) {
    if (isNaN(input.value) || input.value.length != 8) {
        input.setCustomValidity("Le numéro de téléphone doit être un nombre de 8 chiffres.");
        document.getElementById("numtelTick").classList.remove("tick");
        document.getElementById("numtelTick").classList.add("cross");
    } else {
        input.setCustomValidity("");
        document.getElementById("numtelTick").classList.remove("cross");
        document.getElementById("numtelTick").classList.add("tick");
    }
}




</script>

</body>
</html>
<style>
.navbar-nav .nav-item .nav-link {
    position: relative;
    left: -200px;
    color: rgba(128, 128, 128, 0.5);
    background-color: transparent;
    border: 2px solid rgba(128, 128, 128, 0.5);
    border-radius: 5px;
    padding: 0.5rem 1rem;
}
.navbar-nav .nav-item .nav-link .arrow {
    left: -20px;
    top: 50%;
    transform: translateY(-50%);
    color: inherit;
    text-shadow: none;
}
.navbar-nav .nav-item .nav-link .text {
    display: inline-block;
}

    .navbar > .container,
    .navbar > .container-fluid,
    .navbar > .container-sm,
    .navbar > .container-md,
    .navbar > .container-lg,
    .navbar > .container-xl,
    .navbar > .container-xxl {
    flex-wrap: inherit;
    align-items: center;
    justify-content: space-between;
}
@media (min-width: 992px)
.px-lg-5 {
    padding-right: 3rem !important;
    padding-left: 3rem !important;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
@media (min-width: 1200px)
.container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 1140px;
}
@media (min-width: 992px)
.container-lg, .container-md, .container-sm, .container {
    max-width: 960px;
}
@media (min-width: 768px)
.container-md, .container-sm, .container {
    max-width: 720px;
}
@media (min-width: 576px)
.container-sm, .container {
    max-width: 540px;
}
.container, .container-fluid, .container-xxl, .container-xl, .container-lg, .container-md, .container-sm {
    width: 100%;
    padding-right: var(--bs-gutter-x, 0.75rem);
    padding-left: var(--bs-gutter-x, 0.75rem);
    margin-right: auto;
    margin-left: auto;
}
.px-4 {
    padding-right: 1.5rem !important;
    padding-left: 1.5rem !important;
}
*, *::before, *::after {
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
body {
    letter-spacing: 0.0625em;
}
body {
    margin: 0;
    font-family: var(--bs-body-font-family);
    font-size: var(--bs-body-font-size);
    font-weight: var(--bs-body-font-weight);
    line-height: var(--bs-body-line-height);
    color: var(--bs-body-color);
    text-align: var(--bs-body-text-align);
    background-color: var(--bs-body-bg);
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
#mainNav .nav-link {
    background-color: rgb(183 192 199 / 39%);
    color: rgba(26, 26, 26, 20);
  }
/******************************************/
    .login-dark {
  height:1000px;
  background-image: url("/user/view/Front/assets/img/bg-signup.jpg") ;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;
}

.login-dark form {
  max-width:320px;
  width:90%;
  background-color:black;
  padding:40px;
  border-radius:4px;
  transform:translate(-50%, -50%);
  position:absolute;
  top:50%;
  left:50%;
  color:#fff;
  box-shadow:3px 3px 4px rgba(0,0,0,0.2);
}

.login-dark .illustration {
  text-align:center;
  padding:15px 0 20px;
  font-size:100px;
  color: #fff;
}

.login-dark form .form-control {
  background:none;
  border:none;
  border-bottom:1px solid #434a52;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
}

.login-dark form .btn-primary {
  background: blue;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none;
}

.login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
  background:#214a80;
  outline:none;
}

.login-dark form .forgot {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}

.login-dark form .forgot:hover, .login-dark form .forgot:active {
  opacity:1;
  text-decoration:none;
}

.login-dark form .btn-primary:active {
  transform:translateY(1px);
}


</style>