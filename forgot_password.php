<?php
namespace MyNamespace;
use PHPMailer\PHPMailer\PHPMailer;
include_once("C:/xampp/htdocs/user/config.php");

// Check if the form has been submitted
if (isset($_POST['email'])) {
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/DSNConfigurator.php';
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/Exception.php';
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/OAuthTokenProvider.php';
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/PHPMailer.php';
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/POP3.php';
    include  'C:/xampp/htdocs/user/view/Front/PHPMailer-master/src/SMTP.php';
    
    $mail = new PHPMailer();


    // Set the SMTP server details
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'guesmi.aymen@esprit.tn';
    $mail->Password = '211JMT42072001';

    // Set the email details
    $mail->setFrom('guesmi.aymen@esprit.tn', 'Service Client');
    $mail->addAddress($_POST['email']);
    $mail->Subject = 'Mot de passe oublie';
    $password = uniqid();
    $mail->Body = "Bonjour, voici votre nouveau mot de passe : $password";

    // Send the email
    if ($mail->send()) {
        $hashedPassword = $password;
        $db = \config::getConnexion();
        $stmt = $db->prepare("UPDATE client SET mdp = ? WHERE email = ?");
        $stmt->execute([$hashedPassword, $_POST['email']]);
        $stmt2 = $db->prepare("UPDATE client2 SET mdp = ? WHERE email = ?");
        $stmt2->execute([$hashedPassword, $_POST['email']]);
        echo '<script>document.getElementById("result").innerHTML = "E-mail envoyé";</script>';
    } else {
        echo '<script>document.getElementById("result").innerHTML = "Une erreur est survenue: '.$mail->ErrorInfo.'";</script>';
    }
}
?>


<!DOCTYPE html>
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
        <form method="post" onsubmit="showResult()">
            <h2 class="sr-only">Recuperer pass Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="email"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Send me a random password</button></div>
            <div id="result"></div>
        </form>
    </div>
    <script>
        function showResult() {
            var resultDiv = document.getElementById("result");
            resultDiv.innerHTML = "E-mail envoyé";
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
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
    transition: none;
    padding: 0.5rem 1.5rem;
    color: rgba(26, 26, 26, 20);
  }
/******************************************/
    .login-dark {
  height:1000px;
  background-image: url("/user/view/Front/assets/img/bg-signup.jpg") ;
  background-repeat: no-repeat;
  background-size: cover;
  height: 100vh;}

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
