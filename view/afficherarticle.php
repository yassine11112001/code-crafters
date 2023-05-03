<?php

include_once '../../Projet/model/article1.php';
include_once '../../Projet/controller/articleC.php';
require_once(__DIR__ . '/../config.php');

$articleC = new articleC();

// check if form has been submitted
if(isset($_POST['sort'])) {
  $sortby = $_POST['sortby'];

  // modify SQL query based on selected sorting option
  $listeC = $articleC->afficherTrie($sortby);
}else {
  // default SQL query
  $listeC = $articleC->afficherarticle();
}

if (
    isset($_POST["id"]) && 
     isset($_POST["nom"]) && 
    isset($_POST["texte"]) 
) {
    if (
        !empty($_POST["id"]) && 
        !empty($_POST["nom"]) && 
        !empty($_POST["texte"])
    ) {
        $article = new article(
            $_POST['id'],
            $_POST['nom'],
            $_POST['texte']
        );
        $articleC->ajouterarticle($article);
        
        header('Location:affichagearticle.php');
    }
    else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Articles</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
    body {
  background-color: #bde5b8;
  font-family: Arial, sans-serif;
}

header {
  background-color: #4b9c55;
  color: white;
  padding: 20px;
}

h1 {
  font-size: 36px;
  text-align: center;
}

.card {
  background-color: #f5f5f5;
  margin-bottom: 20px;
  border-radius: 10px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}

.card-header {
  background-color: #4b9c55;
  color: white;
  padding: 10px 20px;
  border-radius: 10px 10px 0 0;
}

.card-body {
  padding: 20px;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.table th {
  background-color: #4b9c55;
  color: white;
  font-weight: bold;
  padding: 10px 20px;
  text-align: left;
}

.table td {
  padding: 10px 20px;
  border-bottom: 1px solid #ddd;
}

.btn {
  background-color: #4b9c55;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.btn:hover {
  background-color: #3f834c;
}
</style>
<body>
  <header>
  <form method="GET">
  <label for="search">Search:</label>
  <input type="text" name="search" id="search">
</form>


  <script>
  const searchInput = document.getElementById('search');
  searchInput.addEventListener('input', function() {
    const searchValue = searchInput.value;
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const tableBody = document.querySelector('.datatable tbody');
          tableBody.innerHTML = xhr.responseText;
        } else {
          console.error('Error:', xhr.status);
        }
      }
    };
    xhr.open('GET', `search.php?search=${searchValue}`);
    xhr.send();
  });
</script>
    
  </header>
     <div class="card-body">
                  <h5 class="card-title">read <span>| Today</span></h5>
                  <?php require 'header.php'; ?>
                   <form method="POST">
  <label for="sortby">Sort by:</label>
  <select name="sortby" id="sortby">
    <option value="Nom">Nom</option>
    <option value="Texte">Texte</option>
    <option value="id">ID</option>
  </select>
  <button type="submit" name="sort">Sort</button>
</form>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Article</h2>
    </div>
    <div class="card-body">
      <table class="table table-borderless datatable">
        <tr>
          <th>id</th>
          <th>Nom</th>
          <th>Texte</th>
          <th>Action</th>
        </tr>
        <?php foreach($listeC as $article): ?>
    <tr>
        <td><?= $article->id; ?></td>
        <td><?= $article->Nom; ?></td>
        <td><?= $article->Texte; ?></td>
        <td>
            <a href="edit.php?id=<?= $article->id ?>" class="btn btn-info">Edit</a>
            <a href="delete.php?id=<?= $article->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
<?php endforeach; ?>

      </table>
      <a href="ajouterarticle.php" class="btn btn-success">ajouter article </a>
    </div>
  </div>
</div>
        </body>