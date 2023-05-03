<?php
require_once(__DIR__ . '/../config.php');

$host = 'localhost'; // Replace with your host name
$dbname = 'article'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $connection = new PDO($dsn, $username, $password);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

$id = $_GET['id'];
$sql = 'SELECT * FROM article WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);

$message = '';

if (isset($_POST['Nom']) && isset($_POST['Texte'])) {
  $Nom = $_POST['Nom'];
  $Texte = $_POST['Texte'];

  $sql = 'UPDATE article SET Nom=:Nom, Texte=:Texte WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':Nom' => $Nom, ':Texte' => $Texte, ':id' => $id])) {
    $message = 'Article updated successfully';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Article</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-B71IaiV10qlPnYSKozVx/gx/yeW8Qd26bmvbdwpRtA5PnCeyPnOp5m5ImNP1a3qDxJW0ZvY9X+l4qbg3qAb4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<?php require 'header.php'; ?>
	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				<h2>Update Article</h2>
			</div>
			<div class="card-body">
				<?php if(!empty($message)): ?>
					<div class="alert alert-success">
						<?= $message; ?>
					</div>
				<?php endif; ?>
				<form method="post">
					<div class="form-group">
						<label for="Nom">Nom</label>
						<input value="<?= $person->Nom; ?>" type="text" name="Nom" id="Nom" class="form-control">
					 </div>
					 <div class="form-group">
						<label for="Texte">Texte</label>
						<textarea id="Texte" name="Texte" class="form-control" rows="5"><?= $person->Texte; ?></textarea>
					 </div>
					<div class="form-group">
						<button type="submit" class="btn btn-info">Update Article</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php require 'footer.php'; ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-sjBiBTpQiBEKzD9XAPxuoZIxkiK0CEkG6dxiYWb+0cBjKapuAxyrmBZ/O8BvCn0U4f6KsY6UW8sGwz6OZi6JPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-voV7YzcKjJyV7nSwewQnDm7MQHtJxFZEDmEZX/1IM85i2L/ARwBnC/D8z/dSYKjN86ArhTw20b6AEW8PS3irYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
