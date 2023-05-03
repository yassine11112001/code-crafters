

<?php

include_once '../../Projet/model/article1.php';
include_once '../../Projet/controller/articleC.php';
require_once(__DIR__ . '/../config.php');

$articleC = new articleC();

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $listeC = $articleC->chercherarticle($search);
} else {
  $listeC = $articleC->afficherarticle();
}

ob_start();
foreach ($listeC as $article) {
  ?>
  <tr>
    <td><?= $article->id; ?></td>
    <td><?= $article->nom; ?></td>
    <td><?= $article->texte; ?></td>
    <td>
      <a href="edit.php?id=<?= $article->id ?>" class="btn btn-info">Edit</a>
      <a href="delete.php?id=<?= $article->id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
  </tr>
  <?php
}
$tableBody = ob_get_clean();
echo $tableBody;