<?php
include_once '../../Projet/model/article1.php';
include_once '../../Projet/controller/articleC.php';
require_once(__DIR__ . '/../config.php');

$articleC = new articleC();

if (isset($_POST['id'])&&
isset($_POST['nom'])&&
isset($_POST['texte'])
) {
    if (!empty($_POST['id'])&&
    !empty($_POST['nom'])&&
    !empty($_POST['texte'])
    ) {
        $article = new article(
            $_POST['id'],
            $_POST['nom'],
            $_POST['texte']
        );
        $articleC->ajouterarticle($article);
    }
    else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Ajouter Article</title>
  <link rel="shortcut icon" href="/assets/favicon.ico">
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <!-- Include custom CSS -->
  <link rel="stylesheet" href="./src/main.css">
  <style>
   /* Environment theme */
body {
  background-color: #F9F9F9;
}

.navbar {
  background-color: #5EAE9E;
}

.btn-primary {
  background-color: #5EAE9E;
  border-color: #5EAE9E;
}

.btn-primary:hover {
  background-color: #489883;
  border-color: #489883;
}

.form-control:focus {
  border-color: #5EAE9E;
  box-shadow: none;
}

.login-dark {
  background-color: #fff;
  color: #555;
}

.login-dark h2 {
  color: #333;
}

.illustration {
  color: #fff;
  background-color: #5EAE9E;
}

.alert-success {
  background-color: #DFF0D8;
  color: #3C763D;
  border-color: #D6E9C6;
}

  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand">Zarrouk</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            
            <a class="nav-link" href="afficherarticle.php">read</a>
          </li>      
        </ul>
      </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
<?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <body>
    <div class="login-dark">
        <form method="post">
            <h2 class="sr-only">AJOUTER ARTICLE</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="id" placeholder="id"></div>
			<div class="form-group"><input class="form-control" type="text" name="nom" placeholder="nom"></div>
			<div class="form-group"><input class="form-control" type="text" name="texte" placeholder="text"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Submit</button></div><a href="#" class="forgot"></a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>